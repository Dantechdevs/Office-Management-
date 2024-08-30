<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class OfficeController extends Controller
{
    public function OfficeDashboard()
    {
      return view('office.office_dashboard');
    }
}
