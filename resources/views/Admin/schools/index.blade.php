@extends('Admin.admin_dashboard')

@section('admin')
<div class="page-content">
    <h1>All Schools</h1>
    <a href="{{ route('schools.create') }}" class="btn btn-primary">Add New School</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>County</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($schools as $school)
                <tr>
                    <td>{{ $school->id }}</td>
                    <td>{{ $school->name }}</td>
                    <td>{{ $school->county }}</td>
                    <td>
                        <a href="{{ route('schools.edit', $school->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('schools.destroy', $school->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
