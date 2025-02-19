<?php

namespace App\Services;

use DateTime;
use horstoeko\zugferd\codelists\ZugferdCurrencyCodes;
use horstoeko\zugferd\codelists\ZugferdElectronicAddressScheme;
use horstoeko\zugferd\codelists\ZugferdInvoiceType;
use horstoeko\zugferd\codelists\ZugferdReferenceCodeQualifiers;
use horstoeko\zugferd\codelists\ZugferdVatCategoryCodes;
use horstoeko\zugferd\codelists\ZugferdVatTypeCodes;
use horstoeko\zugferd\ZugferdDocumentBuilder;
use horstoeko\zugferdlaravel\Facades\ZugferdLaravel;
use Illuminate\Support\Facades\Log;

class XmlService
{
    public function generateAndStoreXml(string $outputPath, array $xmlData): void
    {
        $document = ZugferdLaravel::createDocumentInEN16931Profile();
        $document->setDocumentInformation(
            $xmlData['invoiceNumber'],
            ZugferdInvoiceType::INVOICE,
            DateTime::createFromFormat('Ymd', '20240131'),
            ZugferdCurrencyCodes::EURO,
        );

        foreach ($xmlData as $key => $value) {
            $this->setXmlData($document, $key, $value);
        }

        $privateFolder = storage_path('app/private');
        $document->writeFile("{$privateFolder}/{$outputPath}");
    }

    private function setXmlData(ZugferdDocumentBuilder $document, string $key, string|array $value): void
    {
        Log::info("Add to invoice XML: {$key} => ".print_r($value, true));

        switch ($key) {
            case 'notes':
                $document->addDocumentNote($value);
                break;
            case 'billingPeriod':
                $document->setDocumentBillingPeriod(
                    DateTime::createFromFormat('Ymd', '20250101'),
                    DateTime::createFromFormat('Ymd', '20253101'),
                    $value
                );
                break;
            case 'tenderOrLotReferenceDocument':
                $document->addDocumentTenderOrLotReferenceDocument($value);
                break;
            case 'invoicedObjectReferenceDocument':
                $document->addDocumentInvoicedObjectReferenceDocument(
                    $value,
                    ZugferdReferenceCodeQualifiers::SALE_PERS_NUMB
                );
                break;
            case 'contractReferencedDocument':
                $document->setDocumentContractReferencedDocument($value);
                break;
            case 'procuringProject':
                $document->setDocumentProcuringProject($value);
                break;
            case 'paymentMeanToDirectDebit':
                $document->addDocumentPaymentMeanToDirectDebit($value);
                break;
            case 'paymentTerm':
                $document->addDocumentPaymentTerm($value);
                break;
            case 'sellerName':
                $document->setDocumentSeller($value);
                break;
            case 'sellerGlobalId':
                $document->addDocumentSellerGlobalId($value);
                break;
            case 'sellerTaxNumber':
                $document->addDocumentSellerTaxNumber($value);
                break;
            case 'sellerVATRegistrationNumber':
                $document->addDocumentSellerVATRegistrationNumber($value);
                break;
            case 'sellerAddress':
                $document->setDocumentSellerAddress($value);
                break;
            case 'sellerContact':
                $document->setDocumentSellerContact(
                    $value['contactPersonName'],
                    $value['contactDepartmentName'],
                    $value['contactPhoneNo'],
                    $value['contactFaxNo'],
                    $value['contactEmailAddress']
                );
                break;
            case 'sellerCommunication':
                $document->setDocumentSellerCommunication(ZugferdElectronicAddressScheme::UNECE3155_EM, $value);
                break;
            case 'buyerName':
                $document->setDocumentBuyer($value);
                break;
            case 'buyerAddress':
                $document->setDocumentBuyerAddress($value);
                break;
            case 'buyerContact':
                $document->setDocumentBuyerContact(
                    $value['contactPersonName'],
                    $value['contactDepartmentName'],
                    $value['contactPhoneNo'],
                    $value['contactFaxNo'],
                    $value['contactEmailAddress']
                );
                break;
            case 'buyerCommunication':
                $document->setDocumentBuyerCommunication(ZugferdElectronicAddressScheme::UNECE3155_EM, $value);
                break;
            case 'payee':
                $document->setDocumentPayee($value);
                break;
            case 'buyerOrderReferencedDocument':
                $document->setDocumentBuyerOrderReferencedDocument($value);
                break;
            case 'sellerOrderReferencedDocument':
                $document->setDocumentSellerOrderReferencedDocument($value);
                break;
            case 'shipTo':
                $document->setDocumentShipTo($value);
                break;
            case 'shipToAddress':
                $document->setDocumentShipToAddress($value);
                break;
            case 'deliveryDate':
                $document->setDocumentSupplyChainEvent(DateTime::createFromFormat('Ymd', '20250101'));
                break;
            case 'tax':
                $document->addDocumentTax(
                    ZugferdVatCategoryCodes::STAN_RATE,
                    ZugferdVatTypeCodes::VALUE_ADDED_TAX,
                    (float) $value['basisAmount'],
                    (float) $value['calculatedAmount'],
                    (float) $value['rateApplicablePercent'],
                );
                break;
            case 'summation':
                $document->setDocumentSummation(
                    (float) $value['grandTotalAmount'],
                    (float) $value['duePayableAmount'],
                );
                break;
            case 'invoiceNumber':
                // do nothing but also don't print an error
                break;

            default:
                Log::error("Unknown key '{$key}' with value '{$value}'");
        }
    }
}
