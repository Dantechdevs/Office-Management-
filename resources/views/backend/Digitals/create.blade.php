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
                                Add Digital Device
                            </button>
                        </h6>

                        <form action="{{ route('store.digital') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="device_type" class="form-label">Device Type</label>
                                <input type="text" name="device_type" id="device_type" class="form-control @error('device_type') is-invalid @enderror" required>
                                @error('device_type')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror"></textarea>
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-between">
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                                <a href="{{ route('all.digitals') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>

                        <hr>

                        <!-- Device Table -->
                        <h6 class="card-title mt-4">Digital Devices List</h6>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>SN</th>
                                    <th>County</th>
                                    <th>Sub County</th>
                                    <th>Zone</th>
                                    <th>School Name</th>
                                    <th>Date of Delivery (mm/dd/yy)</th>
                                    <th>Teacher Devices</th>
                                    <th>Learner Devices</th>
                                    <th>Hard Disk Drives</th>
                                    <th>Router</th>
                                    <th>Projector</th>
                                    <th>More Detail</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($devices as $device)
                                    <tr>
                                        <td>{{ $device->sn }}</td>
                                        <td>{{ $device->county }}</td>
                                        <td>{{ $device->sub_county }}</td>
                                        <td>{{ $device->zone }}</td>
                                        <td>{{ $device->school_name }}</td>
                                        <td>{{ \Carbon\Carbon::parse($device->date_of_delivery)->format('m/d/y') }}</td>
                                        <td>{{ $device->teacher_devices }}</td>
                                        <td>{{ $device->learner_devices }}</td>
                                        <td>{{ $device->hard_disk_drives }}</td>
                                        <td>{{ $device->router }}</td>
                                        <td>{{ $device->projector }}</td>
                                        <td>
                                            <a href="{{ route('more.detail', $device->id) }}" class="btn btn-info">More Detail</a>
                                            <a href="{{ route('edit.digital', $device->id) }}" class="btn btn-warning">Edit</a>
                                            <form action="{{ route('delete.digital', $device->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this device?');">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="13" class="text-center">No devices found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
