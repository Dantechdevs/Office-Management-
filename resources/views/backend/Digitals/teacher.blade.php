@extends('admin.admin_dashboard')

@section('admin')

<style>
    .table {
        margin: 0 auto; /* Center the table */
        background-color: white; /* White background */
        color: blue; /* Blue font color */
        border-collapse: collapse; /* Ensure borders are combined */
    }
    .table th, .table td {
        border: 1px solid blue; /* Blue borders for table cells */
        padding: 8px; /* Add some padding */
        text-align: center; /* Center text in cells */
    }
    .table th {
        background-color: #f0f8ff; /* Optional: Light background for header */
    }
</style>

<div class="page-content">
    <h2>Teacher Devices (TDD)</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Device Type</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($teacherDevices as $device)
                <tr>
                    <td>{{ $device->device_type }}</td>
                    <td>{{ $device->description }}</td>
                    <td>
                        <a href="{{ route('edit.digital', $device->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('delete.digital', $device->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this device?');">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center">No teacher devices found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
