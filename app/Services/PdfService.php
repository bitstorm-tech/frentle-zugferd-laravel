<?php

namespace App\Services;

use Barryvdh\DomPDF\Facade\Pdf;
use horstoeko\zugferdlaravel\Facades\ZugferdLaravel;

class PdfService
{
    public function generateAndStorePdf(array $invoiceData, string $outputPath, string $template = 'invoice-template')
    {
        $pdf = Pdf::loadView($template, $invoiceData);
        $pdf->save($outputPath, 'local');
    }

    public function mergePdfAndXml(string $pdfPath, string $xmlPath, string $outputPath)
    {
        $xmlPath = storage_path('app/private/').$xmlPath;
        $pdfPath = storage_path('app/private/').$pdfPath;
        $outputPath = storage_path('app/private/').$outputPath;

        ZugferdLaravel::buildMergedPdfByXmlDataOrXmlFilename($xmlPath, $pdfPath, $outputPath);
    }
}
