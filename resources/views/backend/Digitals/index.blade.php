@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">
    <div class="row profile-body">
        <div class="col-md-12 col-xl-12 middle-wrapper">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">
                            Digital Devices
                            <a href="{{ route('add.digital') }}" class="btn btn-primary float-end">Add Digital Device</a>
                        </h6>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Device Type</th>
                                    <th>Description</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($digitals as $digital)
                                <tr>
                                    <td>{{ $digital->id }}</td>
                                    <td>{{ $digital->device_type }}</td>
                                    <td>{{ $digital->description }}</td>
                                    <td>
                                        <a href="{{ route('edit.digital', $digital->id) }}" class="btn btn-warning">Edit</a>
                                        <form action="{{ route('delete.digital', $digital->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this device?');">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
