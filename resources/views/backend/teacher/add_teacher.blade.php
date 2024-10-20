@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="page-content">

    <div class="row profile-body">
      <!-- left wrapper start -->

      <!-- left wrapper end -->
      <!-- middle wrapper start -->
      <div class="col-md-8 col-xl-8 middle-wrapper">
        <div class="row">
          <div class="card">
            <div class="card-body">

              <h6 class="card-title">Add Teachers</h6>

              <form action="{{ route('store.teacher') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Teacher Name</label>
                    <input type="text" name="type_name" class="form-control @error('type_name') is-invalid @enderror">
                    @error('type_name')
                    <span class="text danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Teacher Icon</label>
                    <input type="text" name="teacher_icon" class="form-control @error('teacher_icon') is-invalid @enderror">
                    @error('teacher_icon')
                    <span class="text danger">{{$message}}</span>
                    @enderror
                </div>

                <button type="submit">Add Teacher</button>
            </form>
            </div>
@endsection
