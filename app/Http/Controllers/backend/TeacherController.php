<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Teacher;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    public function AllTeacher(){
        $teachers = Teacher::latest()->get();
        return view('backend.teacher.all_teacher', compact('teachers'));
    } // end method

}

