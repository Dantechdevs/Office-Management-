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

    public function AddTeacher(){
        return view('backend.teacher.add_teacher');
    } // end method

    public function store(Request $request) {
        // Validate the incoming request data
        $request->validate([
            'teacher_name' => 'required|string|max:255',
            'teacher_icon' => 'required|string|max:255',
        ]);

        // Create a new teacher record
        Teacher::create([
            'teacher_name' => $request->input('teacher_name'),
            'teacher_icon' => $request->input('teacher_icon'),
        ]);

        // Redirect to the correct route
        return redirect()->route('all.teacher')->with('success', 'Teacher added successfully!'); // Updated to all.teacher
    }



    public function EditTeacher($id) {
        $teacher = Teacher::findOrFail($id); // Fetch the teacher by ID
        return view('backend.teacher.edit_teacher', compact('teacher')); // Pass the teacher variable to the view
    }

    public function UpdateTeacher(Request $request, $id) {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'phone' => 'required|max:255',
            'address' => 'required',
            'gender' => 'required',
            'dob' => 'required',
        ]);

        $teacher = Teacher::findOrFail($id); // Find the teacher or fail

        $teacher->update($validatedData); // Update the teacher with validated data

        $notification = [
            'message' => 'Teacher Updated Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.teacher')->with($notification);
    }


    public function DeleteTeacher($id){
        $teacher = Teacher::find($id);
        $image = $teacher->image;
        if ($image) {
            unlink($image);
        }
        $teacher->delete();
        $notification = array(
           'message' => 'Teacher Deleted Successfully',
            'alert-type' => 'error'
        );
        return redirect()->route('all.teacher')->with($notification);
    } // end method

}

