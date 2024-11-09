@extends('admin.admin_dashboard')

@section('admin')

<div class="page-content">
    <h4 class="card-title">Edit Record</h4>
    <form action="{{ route('update.record', $record->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="document">Upload New Document (Leave blank to keep current)</label>
            <input type="file" name="document" accept=".doc,.docx,.pdf,.txt">
        </div>
        <button type="submit" class="btn btn-primary">Update Record</button>
    </form>
</div>

@endsection
