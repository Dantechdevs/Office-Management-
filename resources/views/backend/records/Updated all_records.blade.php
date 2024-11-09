@extends('admin.admin_dashboard')

@section('admin')

<div class="page-content">
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <button class="btn btn-success" id="printButton">Print</button>
            <form action="{{ route('export.records') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="btn btn-primary">Export Records</button>
            </form>
            <form action="{{ route('import.records') }}" method="POST" enctype="multipart/form-data" style="display:inline;">
                @csrf
                <input type="file" name="document" accept=".doc,.docx,.pdf,.txt" required>
                <button type="submit" class="btn btn-warning">Import Document</button>
            </form>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Uploaded Documents</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Document Name</th>
                                    <th>Uploaded On</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($records as $record)
                                    <tr>
                                        <td>{{ $record->name }}</td>
                                        <td>{{ $record->created_at->format('Y-m-d H:i') }}</td>
                                        <td>
                                            <a href="{{ route('edit.record', $record->id) }}" class="btn btn-warning">Edit</a>
                                            <form action="{{ route('delete.record', $record->id) }}" method="POST" style="display:inline;">
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
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('printButton').addEventListener('click', function() {
        window.print();
    });
</script>

@endsection
