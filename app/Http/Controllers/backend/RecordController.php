<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Record; // Ensure this model exists
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class RecordController extends Controller
{
    // Fetch all records from the database
    public function AllRecords()
    {
        $records = Record::all(); // Fetching all records
        return view('backend.records.all_records', compact('records'));
    }
    public function import(Request $request)
    {
        $request->validate([
            'document' => 'required|file|mimes:doc,docx,pdf,txt|max:2048', // Validate file
        ]);

        // Store the uploaded document
        $path = $request->file('document')->store('documents');

        // Create a new record in the database
        Record::create(['name' => $request->file('document')->getClientOriginalName(), 'path' => $path]);

        return redirect()->route('all.records')->with('success', 'Document imported successfully.');
    }

    public function export()
    {
        // Logic to export records (e.g., to a CSV file)
        $records = Record::all();
        $csvFileName = 'documents_export_' . date('Ymd') . '.csv';
        $handle = fopen('php://output', 'w');

        // Set headers for download
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="' . $csvFileName . '"');

        // Add CSV header
        fputcsv($handle, ['Document Name', 'Uploaded On']);

        foreach ($records as $record) {
            fputcsv($handle, [$record->name, $record->created_at]);
        }

        fclose($handle);
        exit;
    }

    public function delete($id)
    {
        $record = Record::findOrFail($id);
        Storage::delete($record->path); // Delete the file from storage
        $record->delete(); // Delete the record from the database

        return redirect()->route('all.records')->with('success', 'Document deleted successfully.');
    }

    public function edit($id)
    {
        $record = Record::findOrFail($id); // Find the record by ID
        return view('backend.records.edit_record', compact('record')); // Return the edit view
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'document' => 'nullable|file|mimes:doc,docx,pdf,txt|max:2048', // Validate file (optional)
        ]);

        $record = Record::findOrFail($id); // Find the record by ID

        // If a new document is uploaded, store it and update the path
        if ($request->hasFile('document')) {
            // Delete the old file
            Storage::delete($record->path);
            // Store the new document
            $path = $request->file('document')->store('documents');
            $record->path = $path;
            $record->name = $request->file('document')->getClientOriginalName(); // Update name
        }

        $record->save(); // Save changes to the database

        return redirect()->route('all.records')->with('success', 'Document updated successfully.');
    }


}
