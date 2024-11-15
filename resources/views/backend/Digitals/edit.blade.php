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
                            <button type="button" class="btn btn-primary" style="width: 100%; text-align: left; border: none;">
                                Edit Digital Device
                            </button>
                        </h6>

                        <form action="{{ route('update.digital', $digital->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="device_type" class="form-label">Device Type</label>
                                <input type="text" name="device_type" id="device_type" value="{{ old('device_type', $digital->device_type) }}" class="form-control @error('device_type') is-invalid @enderror" required>
                                @error('device_type')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror">{{ old('description', $digital->description) }}</textarea>
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-between">
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                                <a href="{{ route('all.digitals') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
