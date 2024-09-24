<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\School;

class SchoolController extends Controller
{
    // Display all schools
    public function index()
    {
        return view('Admin.schools.index');
    }

    // Display primary schools
    public function PrimarySchool()
    {
        return view('Admin.schools.primary');
    }

    // Display secondary schools
    public function SecondarySchool()
    {
        $schools = School::all(); // Fetch all schools
        return view('Admin.schools.secondary', compact('schools'));
    }

    // Display the form to add a new school
    public function create()
    {
        return view('Admin.schools.create'); // Adjust the view name as necessary
    }

    // Handle storing a new school
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'county' => 'required|string|max:255',
            'sub_county' => 'required|string|max:255',
            'constituency' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'tsc_registration_number' => 'required|string|max:255',
            'kra_pin' => 'required|string|max:255',
            'nemis_number' => 'required|string|max:255',
            'number_of_students' => 'required|integer',
            'number_of_teachers' => 'required|integer',
            'school_phone' => 'required|string|max:15',
            // Add other fields as necessary
        ]);

        // Create a new school instance and fill it with the validated data
        $school = new School();
        $this->fillSchoolData($school, $request);

        // Save the school to the database
        $school->save();

        // Redirect back with a success message
        return redirect()->route('Admin.schools.secondary')->with('success', 'School added successfully!');
    }

    // Display the form to edit an existing school
    public function edit($id)
    {
        $school = School::findOrFail($id); // Fetch the school by ID
        return view('Admin.schools.edit', compact('school')); // Adjust the view name as necessary
    }

    // Handle updating an existing school
    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'county' => 'required|string|max:255',
            'sub_county' => 'required|string|max:255',
            'constituency' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'tsc_registration_number' => 'required|string|max:255',
            'kra_pin' => 'required|string|max:255',
            'nemis_number' => 'required|string|max:255',
            'number_of_students' => 'required|integer',
            'number_of_teachers' => 'required|integer',
            'school_phone' => 'required|string|max:15',
            // Add other fields as necessary
        ]);

        // Find the existing school and update its data
        $school = School::findOrFail($id);
        $this->fillSchoolData($school, $request);

        // Save the updated school to the database
        $school->save();

        // Redirect back with a success message
        return redirect()->route('Admin.schools.secondary')->with('success', 'School updated successfully!');
    }

    // Handle deleting a school
    public function destroy($id)
    {
        $school = School::findOrFail($id);
        $school->delete(); // Delete the school

        // Redirect back with a success message
        return redirect()->route('Admin.schools.secondary')->with('success', 'School deleted successfully!');
    }

    // Helper method to fill school data
    protected function fillSchoolData(School $school, Request $request)
    {
        $school->county = $request->input('county');
        $school->sub_county = $request->input('sub_county');
        $school->constituency = $request->input('constituency');
        $school->name = $request->input('name');
        $school->tsc_registration_number = $request->input('tsc_registration_number');
        $school->kra_pin = $request->input('kra_pin');
        $school->nemis_number = $request->input('nemis_number');
        $school->number_of_students = $request->input('number_of_students');
        $school->number_of_teachers = $request->input('number_of_teachers');
        $school->school_phone = $request->input('school_phone');

        // Handle file uploads if necessary
        if ($request->hasFile('school_logo')) {
            $school->school_logo = $request->file('school_logo')->store('logos', 'public');
        }
        if ($request->hasFile('documents')) {
            $school->documents = json_encode($request->file('documents')->store('documents', 'public'));
        }
    }
}
