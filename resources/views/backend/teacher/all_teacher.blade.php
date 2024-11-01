@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
          <a href="{{ route('add.teacher') }}" class="btn btn-info">Add Teacher</a>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">All Nzaui Sub County Teachers</h6>

                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>Serial Number</th>
                                    <th>Teacher Name</th>
                                    <th>Teacher Photo</th>
                                    <th>TSC Number</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Alternate Phone</th> <!-- New Column -->
                                    <th>Address</th>
                                    <th>Gender</th>
                                    <th>Date of Birth</th>
                                    <th>Status</th> <!-- New Column -->
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($teachers as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->teacher_name }}</td>
                                    <td>
                                        @if($item->teacher_photo) <!-- Displaying Photo -->
                                            <img src="{{ asset($item->teacher_photo) }}" alt="{{ $item->teacher_name }}" style="width: 50px; height: auto;">
                                        @else
                                            No Image
                                        @endif
                                    </td>
                                    <td>{{ $item->tsc_no }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>{{ $item->alternate_phone }}</td> <!-- Display Alternate Phone -->
                                    <td>{{ $item->address }}</td>
                                    <td>{{ $item->gender }}</td>
                                    <td>{{ $item->dob }}</td>
                                    <td>{{ $item->status }}</td> <!-- Display Status -->
                                    <td>
                                        <a href="{{ route('edit.teacher', $item->id) }}" class="btn btn-warning">Edit</a>
                                        <button type="button" class="btn btn-danger" onclick="confirmDelete('{{ route('delete.teacher', $item->id) }}')">Delete</button>
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
    function confirmDelete(url) {
        if (confirm('Are you sure you want to delete this teacher?')) {
            window.location.href = url;
        }
    }
</script>

@endsection
