<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\AppointmentModel;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index()
    {
        $items = Invoice::orderBy('InvoiceID', 'desc')->paginate(10);
        return view('invoices.index', compact('items'));
    }

    public function create()
    {
        return view('invoices.create', $this->relatedData());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'InvoiceDate' => 'nullable|date',
            'TotalAmount' => 'nullable|numeric',
            'Status' => 'nullable|string|max:30',
            'AppointmentID' => 'nullable|integer',
        ]);

        Invoice::create($validated);

        return redirect()->route('invoices.index')->with('success', 'Invoice created successfully.');
    }

    public function show(Invoice $invoice)
    {
        return view('invoices.show', ['item' => $invoice]);
    }

    public function edit(Invoice $invoice)
    {
        $data = $this->relatedData();
        $data['item'] = $invoice;
        return view('invoices.edit', $data);
    }

    public function update(Request $request, Invoice $invoice)
    {
        $validated = $request->validate([
            'InvoiceDate' => 'nullable|date',
            'TotalAmount' => 'nullable|numeric',
            'Status' => 'nullable|string|max:30',
            'AppointmentID' => 'nullable|integer',
        ]);

        $invoice->update($validated);

        return redirect()->route('invoices.index')->with('success', 'Invoice updated successfully.');
    }

    public function destroy(Invoice $invoice)
    {
        $invoice->delete();
        return redirect()->route('invoices.index')->with('success', 'Invoice deleted successfully.');
    }

    private function relatedData()
    {
        return [
            'appointments' => AppointmentModel::orderBy('AppointmentID')->get(),
        ];
    }
}
