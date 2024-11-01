@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">
    <h2>Routers</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Device Type</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($routers as $device)
                <tr>
                    <td>{{ $device->device_type }}</td>
                    <td>{{ $device->description }}</td>
                    <td>
                        <a href="{{ route('edit.digital', $device->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('delete.digital', $device->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
