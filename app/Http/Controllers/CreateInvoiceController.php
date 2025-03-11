<?php

namespace App\Http\Controllers;

use App\Services\PdfService;
use Illuminate\Http\Request;

use function view;

class CreateInvoiceController
{
    public function __construct(protected PdfService $pdfService) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('create-invoice');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'foo' => 'text|nullable',
            'bar' => '',
        ]);

        // $this->pdfService->generateAndStorePdf()
        // return response()->download();
        return response()->noContent();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
