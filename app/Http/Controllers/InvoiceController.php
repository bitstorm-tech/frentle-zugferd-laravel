<?php

namespace App\Http\Controllers;

use App\Services\PdfService;
use App\Services\XmlService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

use function storage_path;

class InvoiceController
{
    public function __construct(
        protected PdfService $pdfService,
        protected XmlService $xmlService
    ) {}

    public function generate(Request $request): mixed
    {
        Log::debug('Generate E-Rechnung ...');

        $body = $request->json()->all();
        $userId = $body['userId'];
        $invoiceData = $body['invoiceData'];
        $invoiceNumber = $invoiceData['invoiceNumber'];

        $folderName = $this->createFolder($userId, $invoiceNumber);

        $pdfPath = "{$folderName}/{$invoiceNumber}.pdf";
        $this->generatePdf($pdfPath, $invoiceData);

        $xmlPath = "{$folderName}/{$invoiceNumber}.xml";
        $this->generateXml($xmlPath, $invoiceData);

        $mergedPath = "{$folderName}/merged.pdf";
        $this->mergePdfAndXml($pdfPath, $xmlPath, $mergedPath);

        $file = storage_path('app/private/').$mergedPath;

        return response()->download($file, 'invoice.pdf', ['Content-Type: application/pdf']);
    }

    private function createFolder(string $userId, string $invoiceNumber): string
    {
        $folderName = "invoices/{$userId}/{$invoiceNumber}";
        Storage::makeDirectory($folderName);

        return $folderName;
    }

    private function generatePdf(string $outputPath, array $invoiceData): void
    {
        $this->pdfService->generateAndStorePdf($invoiceData, $outputPath);
    }

    private function generateXml(string $outputPath, array $xmlData): void
    {
        $this->xmlService->generateAndStoreXml($outputPath, $xmlData);
    }

    private function mergePdfAndXml(string $pdfPath, string $xmlPath, string $outputPath): void
    {
        $this->pdfService->mergePdfAndXml($pdfPath, $xmlPath, $outputPath);
    }
}
