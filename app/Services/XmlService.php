<?php

namespace App\Services;

use horstoeko\zugferdlaravel\Facades\ZugferdLaravel;

class XmlService
{
    public function generateAndStoreXml(array $data, string $outputPath)
    {
        $privateFolder = storage_path('app/private');

        $document = ZugferdLaravel::createDocumentInEN16931Profile();

        $document
            ->setDocumentInformation('471102', '380', \DateTime::createFromFormat('Ymd', '20180305'), 'EUR')
            ->addDocumentSellerGlobalId('4000001123452', '0088')
            ->addDocumentSellerTaxRegistration('FC', '201/113/40209')
            ->addDocumentSellerTaxRegistration('VA', 'DE123456789')
            ->setDocumentSellerAddress('Lieferantenstraße 20', '', '', '80333', 'München', 'DE')
            ->setDocumentSellerContact('Heinz Mükker', 'Buchhaltung', '+49-111-2222222', '+49-111-3333333', 'info@lieferant.de')
            ->writeFile("{$privateFolder}/{$outputPath}");
    }
}
