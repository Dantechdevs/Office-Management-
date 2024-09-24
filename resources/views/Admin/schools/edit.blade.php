@extends('Admin.admin_dashboard')

@section('admin')
<div class="page-content">
    <h1>Edit School</h1>

    <form action="{{ route('schools.update', $school->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="county">County</label>
            <input type="text" name="county" value="{{ $school->county }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="sub_county">Sub-County</label>
            <input type="text" name="sub_county" value="{{ $school->sub_county }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="constituency">Constituency</label>
            <input type="text" name="constituency" value="{{ $school->constituency }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="name">School Name</label>
            <input type="text" name="name" value="{{ $school->name }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="tsc_registration_number">TSC Registration Number</label>
            <input type="text" name="tsc_registration_number" value="{{ $school->tsc_registration_number }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="kra_pin">KRA PIN</label>
            <input type="text" name="kra_pin" value="{{ $school->kra_pin }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="nemis_number">NEMIS Number</label>
            <input type="text" name="nemis_number" value="{{ $school->nemis_number }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="number_of_students">Number of Students</label>
            <input type="number" name="number_of_students" value="{{ $school->number_of_students }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="number_of_teachers">Number of Teachers</label>
            <input type="number" name="number_of_teachers" value="{{ $school->number_of_teachers }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="school_phone">School Phone Number</label>
            <input type="text" name="school_phone" value="{{ $school->school_phone }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="school_logo">School Logo</label>
            <input type="file" name="school_logo" accept="image/*" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Update School</button>
    </form>
</div>
@endsection
