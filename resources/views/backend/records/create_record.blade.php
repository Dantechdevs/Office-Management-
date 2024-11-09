@extends('admin.admin_dashboard')

@section('admin')

<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a href="{{ route('add.record') }}" class="btn btn-info">Add New Record</a>
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
                    <h4 class="card-title">Create New Record</h4>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('store.record') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="document">Upload Document</label>
                            <input type="file" class="form-control" id="document" name="document" required>
                        </div>

                        <div class="d-flex justify-content-between mt-3">
                            <button type="submit" class="btn btn-primary">Create Record</button>
                            <a href="{{ route('all.records') }}" class="btn btn-secondary">Back to Records</a>
                        </div>
                    </form>
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
