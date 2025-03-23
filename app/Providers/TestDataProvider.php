<?php

namespace App\Providers;

class TestDataProvider
{
    public static function testData(): array
    {
        return [
            'invoiceNumber' => '20250101-4711',
            'notes' => 'Lieferant GmbH | Lieferantenstraße 20 | 80333 München | Deutschland | Geschäftsführer: Hans Muster | Handelsregisternummer: H A 123',
            'billingPeriod' => '01.01.2025 - 31.01.2025',
            'tenderOrLotReferenceDocument' => 'LOS 738625',
            'invoicedObjectReferenceDocument' => '125',
            'contractReferencedDocument' => 'CON-2024/2025-001',
            'procuringProject' => 'PROJ-2025-001-1',
            'paymentMeanToDirectDebit' => 'DE12500105170648489890',
            'paymentTerm' => 'Wird von Konto DE12500105170648489890 abgebucht',
            'paymentDeadline' => '14',
            'paymentBankName' => 'Deutsche Bank',
            'paymentIBAN' => 'DE58 50070024 0123456789',
            'paymentBIC' => 'DEUTDEFFXXX',
            'sellerName' => 'Lieferant GmbH',
            'sellerGlobalId' => '4000001123452',
            'sellerTaxNumber' => '201/113/40209',
            'sellerVATRegistrationNumber' => 'DE123456789',
            'sellerAddress' => [
                'line1' => 'Lieferantenstraße 20',
                'line2' => '',
                'line3' => '',
                'postCode' => '80333',
                'city' => 'München',
                'country' => 'Deutschland',
                'subDivision' => '',
            ],
            'sellerContact' => [
                'contactPersonName' => 'H. Mustermann',
                'contactDepartmentName' => 'Verkauf',
                'contactPhoneNo' => '+49-111-2222222',
                'contactFaxNo' => '+49-111-3333333',
                'contactEmailAddress' => 'hm@lieferant.de',
            ],
            'sellerCommunication' => 'sales@lieferant.de',
            'buyerName' => 'Kunde AG',
            'buyerVATRegistrationNumber' => 'DE-0909090',
            'buyerAddress' => [
                'line1' => 'Kundenstraße 15',
                'line2' => '',
                'line3' => '',
                'postCode' => '69876',
                'city' => 'Frankfurt',
                'country' => 'Deutschland',
                'subDivision' => '',
            ],
            'buyerContact' => [
                'contactPersonName' => 'V. Musterfrau',
                'contactDepartmentName' => 'Einkauf',
                'contactPhoneNo' => '+49-333-4444444',
                'contactFaxNo' => '+49-333-5555555',
                'contactEmailAddress' => 'vm@kunde.de',
            ],
            'buyerCommunication' => 'purchase@kunde.de',
            'payee' => 'Kunde AG Zahlungsdienstleistung',
            'buyerOrderReferencedDocument' => 'PO-2024-0003324',
            'sellerOrderReferencedDocument' => 'SO-2024-000993337',
            'shipTo' => 'Kunde AG Zweigstelle',
            'shipToAddress' => [
                'line1' => 'Zweigstellenstraße 1',
                'line2' => '',
                'line3' => '',
                'postCode' => '04109',
                'city' => 'Leipzig',
                'country' => 'Deutschland',
                'subDivision' => '',
            ],
            'deliveryDate' => '20250115',
            'positions' => [
                [
                    'positionId' => '1',
                    'productDetails' => 'iPhone 16 Pro',
                    'netPrice' => '1699.00',
                    'quantity' => '2',
                    'unitType' => 'Stück',
                    'tax' => '19',
                    'lineSummation' => '3398.00',
                ],
                [
                    'positionId' => '2',
                    'productDetails' => 'AirPods Pro',
                    'netPrice' => '280.00',
                    'quantity' => '2',
                    'unitType' => 'Stück',
                    'tax' => '19',
                    'lineSummation' => '560.00',
                ],
                [
                    'positionId' => '3',
                    'productDetails' => 'Red Apple',
                    'netPrice' => '1.00',
                    'quantity' => '10',
                    'unitType' => 'Stück',
                    'tax' => '7',
                    'lineSummation' => '10.00',
                ],
            ],
            'tax' => [
                [
                    'basisAmount' => '3958.00',
                    'calculatedAmount' => '752.02',
                    'rateApplicablePercent' => '19',
                ],
                [
                    'basisAmount' => '10.00',
                    'calculatedAmount' => '0.70',
                    'rateApplicablePercent' => '7',
                ],
            ],
            'summation' => [
                'grandTotalAmount' => '4720.72',
                'duePayableAmount' => '4720.72',
                'lineTotalAmount' => '3968.00',
                'taxTotalAmount' => '752.72',
            ],
        ];

    }
}
