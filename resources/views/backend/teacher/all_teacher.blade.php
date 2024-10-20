@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
          <a href="{{route('add.teacher')}}" class="btn btn-info">Add Teacher</a>
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
            <th>Teacher Icon</th>
            <th>Action</th>
          </tr>

        </thead>
        <tbody>
          @foreach ($teachers as $key =>$item)

          <tr>
            <td>{{$key+1}}</td>
            <td>{{$item->teacher_name}}</td>
            <td>{{$item->teacher_icon}}</td>
            <td>
  <a href="{{route('edit.teacher',$item->id)}}" class="btn btn-warning">Edit</a>
  <a href="{{route('delete.teacher',$item->id)}}" class="btn btn-danger" id="delete">Delete</a>
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
<
@endsection
