@extends('Admin.admin_dashboard')

@section('admin')
<div class="page-content">
    <h1>{{ $school->name }}</h1>
    <p><strong>County:</strong> {{ $school->county }}</p>
    <p><strong>Sub County:</strong> {{ $school->sub_county }}</p>
    <p><strong>Constituency:</strong> {{ $school->constituency }}</p>
    <p><strong>TSC Registration Number:</strong> {{ $school->tsc_registration_number }}</p>
    <p><strong>KRA PIN:</strong> {{ $school->kra_pin }}</p>
    <p><strong>NEMIS Number:</strong> {{ $school->nemis_number }}</p>
    <p><strong>Number of Students:</strong> {{ $school->number_of_students }}</p>
    <p><strong>Number of Teachers:</strong> {{ $school->number_of_teachers }}</p>
    <p><strong>School Phone:</strong> {{ $school->school_phone }}</p>
    <a href="{{ route('schools.edit', $school->id) }}" class="btn btn-warning">Edit</a>
    <form action="{{ route('schools.delete', $school->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
    <a href="{{ route('schools.index') }}" class="btn btn-secondary">Back to List</a>
</div>
@endsection
