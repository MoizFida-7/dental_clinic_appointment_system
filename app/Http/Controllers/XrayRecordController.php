<?php

namespace App\Http\Controllers;

use App\Models\XrayRecord;
use App\Models\Patient;
use Illuminate\Http\Request;

class XrayRecordController extends Controller
{
    public function index()
    {
        $items = XrayRecord::orderBy('XRayID', 'desc')->paginate(10);
        return view('xrayrecords.index', compact('items'));
    }

    public function create()
    {
        return view('xrayrecords.create', $this->relatedData());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'FilePath' => 'nullable|string|max:255',
            'UploadDate' => 'nullable|date',
            'Notes' => 'nullable|string|max:255',
            'PatientID' => 'nullable|integer',
        ]);

        XrayRecord::create($validated);

        return redirect()->route('xrayrecords.index')->with('success', 'XrayRecord created successfully.');
    }

    public function show(XrayRecord $xrayrecord)
    {
        return view('xrayrecords.show', ['item' => $xrayrecord]);
    }

    public function edit(XrayRecord $xrayrecord)
    {
        $data = $this->relatedData();
        $data['item'] = $xrayrecord;
        return view('xrayrecords.edit', $data);
    }

    public function update(Request $request, XrayRecord $xrayrecord)
    {
        $validated = $request->validate([
            'FilePath' => 'nullable|string|max:255',
            'UploadDate' => 'nullable|date',
            'Notes' => 'nullable|string|max:255',
            'PatientID' => 'nullable|integer',
        ]);

        $xrayrecord->update($validated);

        return redirect()->route('xrayrecords.index')->with('success', 'XrayRecord updated successfully.');
    }

    public function destroy(XrayRecord $xrayrecord)
    {
        $xrayrecord->delete();
        return redirect()->route('xrayrecords.index')->with('success', 'XrayRecord deleted successfully.');
    }

    private function relatedData()
    {
        return [
            'patients' => Patient::orderBy('PatientID')->get(),
        ];
    }
}
