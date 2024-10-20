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

    public function StoreTeacher(Request $request){
        $validatedData = $request->validate([
            'name' =>'required|max:255',
            'email' =>'required|unique:teachers|max:255',
            'phone' =>'required|unique:teachers|max:255',
            'address' =>'required',
            'gender' =>'required',
            'dob' =>'required',
            'password' => '<PASSWORD>',
        ]);

        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['address'] = $request->address;
        $data['gender'] = $request->gender;
        $data['dob'] = $request->dob;
        $data['password'] = Hash::make($request->password); // encrypt password
        $image = $request->file('image');
        if ($image) {
            $image_name = date('dmy_H_s_i');
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/backend/teacher_images/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            if ($success) {
                $data['image'] = $image_url;
            }
        }
        $teacher = Teacher::create($data);
        $notification = array(
           'message' => 'Teacher Added Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.teacher')->with($notification);
    } // end method

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

