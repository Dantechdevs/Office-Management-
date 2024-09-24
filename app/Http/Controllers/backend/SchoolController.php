<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\School;


class SchoolController extends Controller
{
    //
    public function index()
    {
       return view('Admin.schools.index');
    }


    public function PrimarySchool()
    {
       return view('Admin.schools.primary');
    }

    public function SecondarySchool()
    {
        $schools = School::all(); // Fetch all schools

    return view('Admin.schools.secondary', compact('schools'));
    }






}
