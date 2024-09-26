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
                                                <input type="text" name="sub_county" value="{{ $school->sub_county }}" readonly>
                                            </td>
                                            <td>
                                                <a href="{{ route('edit.school', $school->id) }}" class="btn btn-warning">Edit</a>
                                                <a href="{{ route('delete.school', $school->id) }}" class="btn btn-danger" id="delete">Delete</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Constituency</td>
                                            <td>
                                                <select name="constituency" required>
                                                    <option value="">Select Constituency</option>
                                                    <option value="Kibwezi West" {{ $school->constituency == 'Kibwezi West' ? 'selected' : '' }}>Kibwezi West</option>
                                                    <option value="Makueni" {{ $school->constituency == 'Makueni' ? 'selected' : '' }}>Makueni</option>
                                                </select>
                                            </td>
                                            <td>
                                                <a href="{{ route('edit.school', $school->id) }}" class="btn btn-warning">Edit</a>
                                                <a href="{{ route('delete.school', $school->id) }}" class="btn btn-danger" id="delete">Delete</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Secondary School Name</td>
                                            <td>
                                                <select name="secondary_school_name" required>
                                                    <option value="">Select Secondary School</option>
                                                    <option value="{{ $school->name }}" selected>{{ $school->name }}</option>
                                                    <!-- Add other options here -->
                                                </select>
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
