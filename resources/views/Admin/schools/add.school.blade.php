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
                                Add School Details
                            </button>
                        </h6>

                        <form action="{{ route('store.school') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="school_name" class="form-label">School Name</label>
                                <input type="text" name="school_name" id="school_name" class="form-control @error('school_name') is-invalid @enderror" required>
                                @error('school_name')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="school_logo" class="form-label">School Logo</label>
                                <input class="form-control" name="school_logo" type="file" id="school_logo">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Preview</label>
                                <div class="image-preview-container">
                                    <img id="showSchoolLogo" class="wd-80 rounded-circle" src="{{ url('upload/no_image.jpg') }}" alt="School Logo">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="county" class="form-label">County</label>
                                <input type="text" name="county" id="county" class="form-control" value="Makueni" readonly>
                            </div>

                            <div class="mb-3">
                                <label for="subcounty" class="form-label">Subcounty</label>
                                <input type="text" name="subcounty" id="subcounty" class="form-control" value="Nzaui" readonly>
                            </div>

                            <div class="mb-3">
                                <label for="knec_code" class="form-label">KNEC Code</label>
                                <input type="text" name="knec_code" id="knec_code" class="form-control @error('knec_code') is-invalid @enderror" required>
                                @error('knec_code')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="tsc_registration_no" class="form-label">TSC Registration Number</label>
                                <input type="text" name="tsc_registration_no" id="tsc_registration_no" class="form-control @error('tsc_registration_no') is-invalid @enderror" required>
                                @error('tsc_registration_no')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="contact_numbers" class="form-label">Contact Numbers</label>
                                <input type="text" name="contact_numbers" id="contact_numbers" class="form-control @error('contact_numbers') is-invalid @enderror" required>
                                @error('contact_numbers')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="zone" class="form-label">Zone</label>
                                <input type="text" name="zone" id="zone" class="form-control @error('zone') is-invalid @enderror" required>
                                @error('zone')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="school_email" class="form-label">Email</label>
                                <input type="email" name="school_email" id="school_email" class="form-control @error('school_email') is-invalid @enderror" required>
                                @error('school_email')
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
                                <label for="address" class="form-label">Address</label>
                                <textarea name="address" id="address" class="form-control @error('address') is-invalid @enderror"></textarea>
                                @error('address')
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
                            <a href="{{ route('all.school') }}" class="btn btn-secondary">Cancel</a>
                        </form>

                        <script type="text/javascript">
                            $(document).ready(function(){
                                $('#school_logo').change(function(e){
                                    var reader = new FileReader();
                                    reader.onload = function(e){
                                        $('#showSchoolLogo').attr('src', e.target.result);
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

                            #showSchoolLogo {
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
