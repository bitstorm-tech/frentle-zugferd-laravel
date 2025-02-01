<?php

namespace App\Http\Controllers;

use App\Services\PdfService;
use App\Services\XmlService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class InvoiceController extends Controller
{
    public function __construct(
        protected PdfService $pdfService,
        protected XmlService $xmlService
    ) {}

    public function generate(Request $request)
    {
        Log::debug('Generate E-Rechnung ...');

        $validated = $request->validate([
            'userId' => 'required|string',
        ]);

        $folderName = $this->createFolder($validated['userId']);

        $pdfPath = "{$folderName}/invoice.pdf";
        $this->generatePdf($pdfPath);

        $xmlPath = "{$folderName}/invoice.xml";
        $this->generateXml($xmlPath);

        $mergedPath = "{$folderName}/merged.pdf";
        $this->mergePdfAndXml($pdfPath, $xmlPath, $mergedPath);

        return response()->json([
            'message' => 'Invoice generated successfully',
            'data' => $validated,
        ]);
    }

    private function createFolder(string $userId): string
    {

        $today = now()->format('Y_m_d');
        $uuid = uuid_create();
        $invoiceId = "invoice_{$today}_{$uuid}";
        $folderName = "invoices/user_{$userId}/{$invoiceId}";
        Storage::makeDirectory($folderName);

        return $folderName;
    }

    private function generatePdf(string $outputPath)
    {
        $pdfData = [
            'name' => 'Ibims!!',
            'date' => now()->format('Y-m-d'),
        ];

        $this->pdfService->generateAndStorePdf($pdfData, $outputPath);
    }

    private function generateXml(string $outputPath)
    {
        $xmlData = [];
        $this->xmlService->generateAndStoreXml($xmlData, $outputPath);
    }

    private function mergePdfAndXml(string $pdfPath, string $xmlPath, string $outputPath)
    {
        $this->pdfService->mergePdfAndXml($pdfPath, $xmlPath, $outputPath);
    }
}
