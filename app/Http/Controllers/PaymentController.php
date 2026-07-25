<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Invoice;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $items = Payment::orderBy('PaymentID', 'desc')->paginate(10);
        return view('payments.index', compact('items'));
    }

    public function create()
    {
        return view('payments.create', $this->relatedData());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'PaymentDate' => 'nullable|date',
            'AmountPaid' => 'nullable|numeric',
            'PaymentMethod' => 'nullable|string|max:50',
            'InvoiceID' => 'nullable|integer',
        ]);

        Payment::create($validated);

        return redirect()->route('payments.index')->with('success', 'Payment created successfully.');
    }

    public function show(Payment $payment)
    {
        return view('payments.show', ['item' => $payment]);
    }

    public function edit(Payment $payment)
    {
        $data = $this->relatedData();
        $data['item'] = $payment;
        return view('payments.edit', $data);
    }

    public function update(Request $request, Payment $payment)
    {
        $validated = $request->validate([
            'PaymentDate' => 'nullable|date',
            'AmountPaid' => 'nullable|numeric',
            'PaymentMethod' => 'nullable|string|max:50',
            'InvoiceID' => 'nullable|integer',
        ]);

        $payment->update($validated);

        return redirect()->route('payments.index')->with('success', 'Payment updated successfully.');
    }

    public function destroy(Payment $payment)
    {
        $payment->delete();
        return redirect()->route('payments.index')->with('success', 'Payment deleted successfully.');
    }

    private function relatedData()
    {
        return [
            'invoices' => Invoice::orderBy('InvoiceID')->get(),
        ];
    }
}
