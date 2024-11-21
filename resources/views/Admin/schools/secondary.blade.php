@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('schools.secondary') }}" class="btn btn-info">Add Secondary School</a>
            </li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">All Secondary Schools</h6>

                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>Field</th>
                                    <th>Value</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($schools->isEmpty())
                                    <tr>
                                        <td colspan="3">No data available in table</td>
                                    </tr>
                                @else
                                    @foreach ($schools as $school)
                                        <tr>
                                            <td>County</td>
                                            <td>
                                                <input type="text" name="county" value="{{ $school->county }}" readonly>
                                            </td>
                                            <td>
                                                <a href="{{ route('edit.school', $school->id) }}" class="btn btn-warning">Edit</a>
                                                <a href="{{ route('delete.school', $school->id) }}" class="btn btn-danger" id="delete">Delete</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Sub-County</td>
                                            <td>
                                                <input type="text" name="subcounty" value="{{ $school->subcounty }}" readonly>
                                            </td>
                                            <td>
                                                <a href="{{ route('edit.school', $school->id) }}" class="btn btn-warning">Edit</a>
                                                <a href="{{ route('delete.school', $school->id) }}" class="btn btn-danger" id="delete">Delete</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>KNEC Code</td>
                                            <td>
                                                <input type="text" name="knec_code" value="{{ $school->knec_code }}" readonly>
                                            </td>
                                            <td>
                                                <a href="{{ route('edit.school', $school->id) }}" class="btn btn-warning">Edit</a>
                                                <a href="{{ route('delete.school', $school->id) }}" class="btn btn-danger" id="delete">Delete</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>TSC Registration Number</td>
                                            <td>
                                                <input type="text" name="tsc_registration_no" value="{{ $school->tsc_registration_no }}" readonly>
                                            </td>
                                            <td>
                                                <a href="{{ route('edit.school', $school->id) }}" class="btn btn-warning">Edit</a>
                                                <a href="{{ route('delete.school', $school->id) }}" class="btn btn-danger" id="delete">Delete</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Contact Numbers</td>
                                            <td>
                                                <input type="text" name="contact_numbers" value="{{ $school->contact_numbers }}" readonly>
                                            </td>
                                            <td>
                                                <a href="{{ route('edit.school', $school->id) }}" class="btn btn-warning">Edit</a>
                                                <a href="{{ route('delete.school', $school->id) }}" class="btn btn-danger" id="delete">Delete</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Zone</td>
                                            <td>
                                                <input type="text" name="zone" value="{{ $school->zone }}" readonly>
                                            </td>
                                            <td>
                                                <a href="{{ route('edit.school', $school->id) }}" class="btn btn-warning">Edit</a>
                                                <a href="{{ route('delete.school', $school->id) }}" class="btn btn-danger" id="delete">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
