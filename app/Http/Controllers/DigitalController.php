<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Digital; // Make sure to import your model

class DigitalController extends Controller
{
    // Display a listing of the digital devices
    public function index()
    {
        $digitals = Digital::all(); // Fetch all digital devices
        return view('digitals.index', compact('digitals')); // Adjust the view as necessary
    }

    // Show the form for creating a new digital device
    public function create()
    {
        return view('digitals.create'); // Create the view for adding a digital device
    }

    // Store a newly created digital device in storage
    public function store(Request $request)
    {
        $request->validate([
            'device_type' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Digital::create($request->all()); // Save the digital device data
        return redirect()->route('all.digitals')->with('success', 'Digital device added successfully!');
    }

    // Show the form for editing the specified digital device
    public function edit($id)
    {
        $digital = Digital::findOrFail($id); // Find the digital device by ID
        return view('digitals.edit', compact('digital')); // Adjust the view as necessary
    }

    // Update the specified digital device in storage
    public function update(Request $request, $id)
    {
        $request->validate([
            'device_type' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $digital = Digital::findOrFail($id);
        $digital->update($request->all()); // Update the digital device data
        return redirect()->route('all.digitals')->with('success', 'Digital device updated successfully!');
    }

    // Remove the specified digital device from storage
    public function destroy($id)
    {
        $digital = Digital::findOrFail($id);
        $digital->delete(); // Delete the digital device
        return redirect()->route('all.digitals')->with('success', 'Digital device deleted successfully!');
    }

    // Show Learner Devices
    public function showLearnerDevices()
    {
        $learnerDevices = Digital::where('device_type', 'Learner Devices')->get();
        return view('digitals.learner', compact('learnerDevices'));
    }

    // Show Teacher Devices
    public function showTeacherDevices()
    {
        $teacherDevices = Digital::where('device_type', 'Teacher Devices')->get();
        return view('digitals.teacher', compact('teacherDevices'));
    }

    // Show Routers
    public function showRouters()
    {
        $routers = Digital::where('device_type', 'Router')->get();
        return view('digitals.routers', compact('routers'));
    }

    // Show Hard Disks
    public function showHardDisks()
    {
        $hardDisks = Digital::where('device_type', 'Hard Disk')->get();
        return view('digitals.hard_disks', compact('hardDisks'));
    }

    // Show Projectors
    public function showProjectors()
    {
        $projectors = Digital::where('device_type', 'Projector')->get();
        return view('digitals.projectors', compact('projectors'));
    }
}
