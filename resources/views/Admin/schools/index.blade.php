@extends('Admin.admin_dashboard')

@section('admin')
<div class="page-content">
    <h1>Schools</h1>
    <a href="{{ route('schools.create') }}" class="btn btn-primary">Add New School</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>County</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($schools as $school)
                <tr>
                    <td>{{ $school->name }}</td>
                    <td>{{ $school->county }}</td>
                    <td>
                        <a href="{{ route('schools.edit', $school->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('schools.delete', $school->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        <a href="{{ route('schools.show', $school->id) }}" class="btn btn-info">View</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
