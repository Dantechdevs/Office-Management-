@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="page-content">
    <div class="row profile-body">
        <div class="col-md-12 col-xl-12 middle-wrapper">
            <div class="row">
                <div class="card">
                    <div class="card-body">

                        <h6 class="card-title">
                            <button type="button" class="btn btn-link" style="font-size: 1.25rem; text-decoration: none; color: inherit;">
                                Edit Teacher Details
                            </button>
                        </h6>

                        <form method="POST" action="{{ route('update.teacher', $teachers->id) }}" class="form-sample" enctype="multipart/form-data">
                            @csrf
                            @method('PUT') <!-- Use PUT method for updates -->
                            <input type="hidden" name="id" value="{{ $teachers->id }}">

                            <div class="mb-3">
                                <label for="teacher_name" class="form-label">Teacher Name</label>
                                <input type="text" name="teacher_name" class="form-control @error('teacher_name') is-invalid @enderror" value="{{ old('teacher_name', $teachers->teacher_name) }}" required>
                                @error('teacher_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="tsc_no" class="form-label">TSC Number</label>
                                <input type="text" name="tsc_no" class="form-control @error('tsc_no') is-invalid @enderror" value="{{ old('tsc_no', $teachers->tsc_no) }}" required>
                                @error('tsc_no')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $teachers->email) }}" required>
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone', $teachers->phone) }}">
                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <textarea name="address" class="form-control @error('address') is-invalid @enderror">{{ old('address', $teachers->address) }}</textarea>
                                @error('address')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="gender" class="form-label">Gender</label>
                                <select name="gender" class="form-control @error('gender') is-invalid @enderror">
                                    <option value="">Select Gender</option>
                                    <option value="male" {{ $teachers->gender == 'male' ? 'selected' : '' }}>Male</option>
                                    <option value="female" {{ $teachers->gender == 'female' ? 'selected' : '' }}>Female</option>
                                    <option value="other" {{ $teachers->gender == 'other' ? 'selected' : '' }}>Other</option>
                                </select>
                                @error('gender')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="dob" class="form-label">Date of Birth</label>
                                <input type="date" name="dob" class="form-control @error('dob') is-invalid @enderror" value="{{ old('dob', $teachers->dob) }}">
                                @error('dob')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="teacher_photo" class="form-label">Teacher Photo</label>
                                <input type="file" name="teacher_photo" class="form-control @error('teacher_photo') is-invalid @enderror" id="teacher_photo">
                                @error('teacher_photo')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Current Photo</label>
                                <div class="image-preview-container">
                                    <img id="showTeacherImage" class="wd-80 rounded-circle" src="{{(!empty($teachers->teacher_photo)) ? url('upload/teacher_images/'.$teachers->teacher_photo) : url('upload/no_image.jpg')}}" alt="Teacher Photo">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary me-2">Save Changes</button>
                            <a href="{{ route('all.teacher') }}" class="btn btn-secondary">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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
        justify-content: center;
        align-items: center;
        margin-top: 10px; /* Adds spacing above the image */
    }

    #showTeacherImage {
        width: 80px; /* Set the desired width */
        height: 80px; /* Set the desired height */
        border-radius: 50%; /* Makes the image circular */
        object-fit: cover; /* Ensures the image covers the area without distortion */
    }
</style>
@endsection
