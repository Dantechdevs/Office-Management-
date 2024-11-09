<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Record; // Ensure this model exists
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;

class RecordController extends Controller
{
    // Fetch all records from the database
    public function AllRecords()
    {
        $records = Record::all(); // Fetching all records
        return view('backend.records.all_records', compact('records'));
    }

    
}
