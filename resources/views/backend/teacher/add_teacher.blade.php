@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="page-content">
    <div class="row profile-body">
        <!-- middle wrapper start -->
        <div class="col-md-12 col-xl- middle-wrapper">
            <div class="row">
                <div class="card">
                    <div class="card-body">

                        <h6 class="card-title">
                            <button type="button" class="btn btn-primary" style="width: 100%; text-align: left; border: none;">
                                Add Teacher Details
                            </button>
                        </h6>

                        <form action="{{ route('store.teacher') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="teacher_name" class="form-label">Teacher Name</label>
                                <input type="text" name="teacher_name" id="teacher_name" class="form-control @error('teacher_name') is-invalid @enderror" required>
                                @error('teacher_name')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="teacher_photo" class="form-label">Teacher Photo</label>
                                <input class="form-control" name="teacher_photo" type="file" id="teacher_photo">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Preview</label>
                                <div class="image-preview-container">
                                    <img id="showTeacherImage" class="wd-80 rounded-circle" src="{{ url('upload/no_image.jpg') }}" alt="Teacher Photo">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="tsc_no" class="form-label">TSC Number</label>
                                <input type="text" name="tsc_no" id="tsc_no" class="form-control @error('tsc_no') is-invalid @enderror" required>
                                @error('tsc_no')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" required>
                                @error('email')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror">
                                @error('phone')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="alternate_phone" class="form-label">Alternate Phone</label>
                                <input type="text" name="alternate_phone" id="alternate_phone" class="form-control @error('alternate_phone') is-invalid @enderror">
                                @error('alternate_phone')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <textarea name="address" id="address" class="form-control @error('address') is-invalid @enderror"></textarea>
                                @error('address')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="gender" class="form-label">Gender</label>
                                <select name="gender" id="gender" class="form-control @error('gender') is-invalid @enderror">
                                    <option value="">Select Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>
                                @error('gender')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="dob" class="form-label">Date of Birth</label>
                                <input type="date" name="dob" id="dob" class="form-control @error('dob') is-invalid @enderror">
                                @error('dob')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                                @error('status')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary me-2">Save Changes</button>
                            <a href="{{ route('all.teacher') }}" class="btn btn-secondary">Cancel</a>
                        </form>

                        <script type="text/javascript">
                            $(document).ready(function(){
                                $('#teacher_photo').change(function(e){
                                    var reader = new FileReader();
                                    reader.onload = function(e){
                                        $('#showTeacherImage').attr('src', e.target.result);
                                    }
                                    reader.readAsDataURL(e.target.files[0]);
                                });
                            });
                        </script>

                        <style>
                            .image-preview-container {
                                display: flex;
                                justify-content: left;
                                align-items: left;
                                margin-top: 10px; /* Adds spacing above the image */
                            }

                            #showTeacherImage {
                                width: 80px; /* Set the desired width */
                                height: 80px; /* Set the desired height */
                                border-radius: 50%; /* Makes the image circular */
                                object-fit: cover; /* Ensures the image covers the area without distortion */
                            }
                        </style>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
