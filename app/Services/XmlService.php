<?php

namespace App\Services;

use DateTime;
use horstoeko\zugferd\codelists\ZugferdCurrencyCodes;
use horstoeko\zugferd\codelists\ZugferdElectronicAddressScheme;
use horstoeko\zugferd\codelists\ZugferdInvoiceType;
use horstoeko\zugferd\codelists\ZugferdReferenceCodeQualifiers;
use horstoeko\zugferd\codelists\ZugferdUnitCodes;
use horstoeko\zugferd\codelists\ZugferdVatCategoryCodes;
use horstoeko\zugferd\codelists\ZugferdVatTypeCodes;
use horstoeko\zugferd\ZugferdDocumentBuilder;
use horstoeko\zugferdlaravel\Facades\ZugferdLaravel;
use Illuminate\Support\Facades\Log;

use function storage_path;

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
        // Log::info("Add to invoice XML: {$key} => ".print_r($value, true));

        match ($key) {
            'notes' => $document->addDocumentNote($value),

            'billingPeriod' => $document->setDocumentBillingPeriod(
                DateTime::createFromFormat('Ymd', '20250101'),
                DateTime::createFromFormat('Ymd', '20253101'),
                $value
            ),

            'tenderOrLotReferenceDocument' => $document->addDocumentTenderOrLotReferenceDocument($value),

            'invoicedObjectReferenceDocument' => $document->addDocumentInvoicedObjectReferenceDocument(
                $value,
                ZugferdReferenceCodeQualifiers::SALE_PERS_NUMB
            ),

            'contractReferencedDocument' => $document->setDocumentContractReferencedDocument($value),

            'procuringProject' => $document->setDocumentProcuringProject($value),

            'paymentMeanToDirectDebit' => $document->addDocumentPaymentMeanToDirectDebit($value),

            'paymentTerm' => $document->addDocumentPaymentTerm($value),

            'sellerName' => $document->setDocumentSeller($value),

            'sellerGlobalId' => $document->addDocumentSellerGlobalId($value),

            'sellerTaxNumber' => $document->addDocumentSellerTaxNumber($value),

            'sellerVATRegistrationNumber' => $document->addDocumentSellerVATRegistrationNumber($value),

            'sellerAddress' => $document->setDocumentSellerAddress(
                $value['line1'],
                $value['line2'],
                $value['line3'],
                $value['postCode'],
                $value['city'],
                $value['country'],
                $value['subDivision'],
            ),

            'sellerContact' => $document->setDocumentSellerContact(
                $value['contactPersonName'],
                $value['contactDepartmentName'],
                $value['contactPhoneNo'],
                $value['contactFaxNo'],
                $value['contactEmailAddress']
            ),

            'sellerCommunication' => $document->setDocumentSellerCommunication(ZugferdElectronicAddressScheme::UNECE3155_EM, $value),

            'buyerName' => $document->setDocumentBuyer($value),

            'buyerAddress' => $document->setDocumentBuyerAddress(
                $value['line1'],
                $value['line2'],
                $value['line3'],
                $value['postCode'],
                $value['city'],
                $value['country'],
                $value['subDivision'],
            ),

            'buyerContact' => $document->setDocumentBuyerContact(
                $value['contactPersonName'],
                $value['contactDepartmentName'],
                $value['contactPhoneNo'],
                $value['contactFaxNo'],
                $value['contactEmailAddress']
            ),

            'buyerCommunication' => $document->setDocumentBuyerCommunication(ZugferdElectronicAddressScheme::UNECE3155_EM, $value),

            'payee' => $document->setDocumentPayee($value),

            'buyerOrderReferencedDocument' => $document->setDocumentBuyerOrderReferencedDocument($value),

            'sellerOrderReferencedDocument' => $document->setDocumentSellerOrderReferencedDocument($value),

            'shipTo' => $document->setDocumentShipTo($value),

            'shipToAddress' => $document->setDocumentShipToAddress(
                $value['line1'],
                $value['line2'],
                $value['line3'],
                $value['postCode'],
                $value['city'],
                $value['country'],
                $value['subDivision'],
            ),

            'deliveryDate' => $document->setDocumentSupplyChainEvent(DateTime::createFromFormat('Ymd', '20250101')),

            'positions' => $this->addPositions($document, $value),

            'tax' => $document->addDocumentTax(
                ZugferdVatCategoryCodes::STAN_RATE,
                ZugferdVatTypeCodes::VALUE_ADDED_TAX,
                (float) $value['basisAmount'],
                (float) $value['calculatedAmount'],
                (float) $value['rateApplicablePercent'],
            ),

            'summation' => $document->setDocumentSummation(
                (float) $value['grandTotalAmount'],
                (float) $value['duePayableAmount'],
            ),

            'invoiceNumber', 'buyerVATRegistrationNumber' => true, // do nothing but also don't print an error

            default => Log::error("Unknown key: '{$key}'"),
        };
    }

    private function addPositions(ZugferdDocumentBuilder $document, array $positions): void
    {
        foreach ($positions as $position) {
            $document->addNewPosition($position['positionId']);
            $document->setDocumentPositionProductDetails($position['productDetails']);
            $document->setDocumentPositionNetPrice((float) $position['netPrice']);
            $document->setDocumentPositionQuantity((float) $position['quantity'], ZugferdUnitCodes::REC20_PIECE);
            $document->addDocumentPositionTax(
                ZugferdVatCategoryCodes::STAN_RATE,
                ZugferdVatTypeCodes::VALUE_ADDED_TAX,
                (float) $position['tax']
            );
            $document->setDocumentPositionLineSummation((float) $position['positionId']);
        }
    }
}
