@extends('Admin.admin_dashboard')

@section('admin')
<div class="page-content">
    <h1>Add New School</h1>

    <form action="{{ route('schools.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="county">County</label>
            <input type="text" name="county" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="sub_county">Sub-County</label>
            <input type="text" name="sub_county" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="constituency">Constituency</label>
            <input type="text" name="constituency" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="name">School Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="tsc_registration_number">TSC Registration Number</label>
            <input type="text" name="tsc_registration_number" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="kra_pin">KRA PIN</label>
            <input type="text" name="kra_pin" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="nemis_number">NEMIS Number</label>
            <input type="text" name="nemis_number" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="number_of_students">Number of Students</label>
            <input type="number" name="number_of_students" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="number_of_teachers">Number of Teachers</label>
            <input type="number" name="number_of_teachers" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="school_phone">School Phone Number</label>
            <input type="text" name="school_phone" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="school_logo">School Logo</label>
            <input type="file" name="school_logo" accept="image/*" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Add School</button>
    </form>
</div>
@endsection
