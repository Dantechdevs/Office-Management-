@extends('admin.admin_dashboard')

@section('admin')

<div class="page-content">
    <h4 class="card-title">Add New Record</h4>
    <form action="{{ route('store.record') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="document">Upload Document</label>
            <input type="file" name="document" accept=".doc,.docx,.pdf,.txt" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Record</button>
    </form>
</div>

@endsection
