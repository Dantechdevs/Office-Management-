<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
       return view('Admin.schools.secondary');
    }





}
