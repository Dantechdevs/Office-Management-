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
    <h2>Devices Overview</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>SN</th>
                <th>County</th>
                <th>Sub County</th>
                <th>Zone</th>
                <th>School Name</th>
                <th>Date of Delivery (mm/dd/yy)</th>
                <th>Teacher Devices</th>
                <th>Learner Devices</th>
                <th>Hard Disk Drives</th>
                <th>Router</th>
                <th>Projector</th>
                <th>More Detail</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($devices as $device)
                <tr>
                    <td>{{ $device->sn }}</td>
                    <td>{{ $device->county }}</td>
                    <td>{{ $device->sub_county }}</td>
                    <td>{{ $device->zone }}</td>
                    <td>{{ $device->school_name }}</td>
                    <td>{{ \Carbon\Carbon::parse($device->date_of_delivery)->format('m/d/y') }}</td>
                    <td>{{ $device->teacher_devices }}</td>
                    <td>{{ $device->learner_devices }}</td>
                    <td>{{ $device->hard_disk_drives }}</td>
                    <td>{{ $device->router }}</td>
                    <td>{{ $device->projector }}</td>
                    <td>
                        <a href="{{ route('more.detail', $device->id) }}" class="btn btn-info">More Detail</a>
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
                    <td colspan="13" class="text-center">No devices found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
