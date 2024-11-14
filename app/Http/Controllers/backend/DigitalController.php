<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Digital;

class DigitalController extends Controller
{
    // Display a listing of the digital devices
    public function index()
    {
        $digitals = Digital::all(); // Fetch all digital devices
        return view('backend.digitals.index', compact('digitals')); // Adjust the view path
    }

    // Show the form for creating a new digital device
    public function create()
    {
        return view('backend.digitals.create'); // Create the view for adding a digital device
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
        return view('backend.digitals.edit', compact('digital')); // Adjust the view path
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
   // Show Learner Devices
public function showLearnerDevices()
{
    $devices = Digital::where('device_type', 'Learner Devices')->get();
    return view('backend.digitals.learner', compact('devices')); // Ensure this matches the view path
}

    // Show Teacher Devices
    public function showTeacherDevices()
    {
        $teacherDevices = Digital::where('device_type', 'Teacher Devices')->get();
        return view('backend.digitals.teacher', compact('teacherDevices')); // Adjust the view path
    }

    // Show Routers
    public function showRouters()
    {
        $routers = Digital::where('device_type', 'Router')->get();
        return view('backend.digitals.routers', compact('routers')); // Adjust the view path
    }

    // Show Hard Disks
    public function showHardDisks()
    {
        $hardDisks = Digital::where('device_type', 'Hard Disk')->get();
        return view('backend.digitals.hard_disks', compact('hardDisks')); // Adjust the view path
    }

    // Show Projectors
    public function showProjectors()
    {
        $projectors = Digital::where('device_type', 'Projector')->get();
        return view('backend.digitals.projectors', compact('projectors')); // Adjust the view path
    }

}
