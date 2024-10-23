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
            'teacher_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tsc_no' => 'required|string|max:255|unique:teachers',
            'email' => 'required|email|unique:teachers',
            'phone' => 'nullable|string|max:15',
            'alternate_phone' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:500',
            'gender' => 'nullable|in:male,female,other',
            'dob' => 'nullable|date',
            'status' => 'nullable|in:active,inactive'
        ]);

        // Handle file upload for teacher_photo
        $teacherPhotoPath = null;
        if ($request->hasFile('teacher_photo')) {
            $file = $request->file('teacher_photo');
            $teacherPhotoPath = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/teacher_photos'), $teacherPhotoPath);
        }

        // Create a new teacher record
        Teacher::create([
            'teacher_name' => $request->input('teacher_name'),
            'teacher_photo' => $teacherPhotoPath,
            'tsc_no' => $request->input('tsc_no'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'alternate_phone' => $request->input('alternate_phone'),
            'address' => $request->input('address'),
            'gender' => $request->input('gender'),
            'dob' => $request->input('dob'),
            'status' => $request->input('status'),
        ]);

        return redirect()->route('all.teacher')->with('success', 'Teacher added successfully!');
    }



    public function EditTeacher($id) {
        $teachers = Teacher::find($id);

        if (!$teachers) {
            return redirect()->route('all.teacher')->with('error', 'Teacher not found.');
        }

        return view('backend.teacher.edit_teacher', compact('teachers'));
    }


    public function UpdateTeacher(Request $request, $id) {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'teacher_name' => 'required|max:255', // Updated field name
            'teacher_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Optional image validation
            'tsc_no' => 'required|string|max:255|unique:teachers,tsc_no,' . $id, // TSC Number with exception for current record
            'email' => 'required|email|max:255|unique:teachers,email,' . $id, // Email with exception for current record
            'phone' => 'nullable|string|max:15', // Phone number
            'address' => 'nullable|string|max:500', // Address
            'gender' => 'nullable|in:male,female,other', // Gender
            'dob' => 'nullable|date', // Date of Birth
        ]);

        // Find the teacher or fail
        $teacher = Teacher::findOrFail($id);

        // Handle file upload for teacher_photo if a new file is provided
        if ($request->hasFile('teacher_photo')) {
            // Delete the old image if it exists
            if ($teacher->teacher_photo && file_exists(public_path('upload/teacher_photos/' . $teacher->teacher_photo))) {
                unlink(public_path('upload/teacher_photos/' . $teacher->teacher_photo));
            }

            // Store the new image
            $file = $request->file('teacher_photo');
            $teacherPhotoPath = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/teacher_photos'), $teacherPhotoPath);

            // Update the teacher's photo path in the validated data
            $validatedData['teacher_photo'] = $teacherPhotoPath;
        } else {
            // Keep the existing photo if no new file is uploaded
            $validatedData['teacher_photo'] = $teacher->teacher_photo;
        }

        // Update the teacher with validated data
        $teacher->update($validatedData);

        // Notification message
        $notification = [
            'message' => 'Teacher Updated Successfully',
            'alert-type' => 'success'
        ];

        // Redirect to the correct route
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

