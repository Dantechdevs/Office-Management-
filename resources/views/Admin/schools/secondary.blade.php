@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a href="{{ route('schools.secondary') }}" class="btn btn-info">Add Secondary School</a>
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
                                                </select>
                                            </td>
                                            <td>
                                                <a href="{{ route('edit.school', $school->id) }}" class="btn btn-warning">Edit</a>
                                                <a href="{{ route('delete.school', $school->id) }}" class="btn btn-danger" id="delete">Delete</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>School Logo</td>
                                            <td>
                                                <input type="file" name="school_logo" accept="image/*">
                                            </td>
                                            <td>
                                                <a href="{{ route('edit.school', $school->id) }}" class="btn btn-warning">Edit</a>
                                                <a href="{{ route('delete.school', $school->id) }}" class="btn btn-danger" id="delete">Delete</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>TSC Registration Number</td>
                                            <td>
                                                <input type="text" name="tsc_registration_number" value="{{ $school->tsc_registration_number }}" required>
                                            </td>
                                            <td>
                                                <a href="{{ route('edit.school', $school->id) }}" class="btn btn-warning">Edit</a>
                                                <a href="{{ route('delete.school', $school->id) }}" class="btn btn-danger" id="delete">Delete</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>KRA PIN</td>
                                            <td>
                                                <input type="text" name="kra_pin" value="{{ $school->kra_pin }}" required>
                                            </td>
                                            <td>
                                                <a href="{{ route('edit.school', $school->id) }}" class="btn btn-warning">Edit</a>
                                                <a href="{{ route('delete.school', $school->id) }}" class="btn btn-danger" id="delete">Delete</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>NEMIS Number</td>
                                            <td>
                                                <input type="text" name="nemis_number" value="{{ $school->nemis_number }}" required>
                                            </td>
                                            <td>
                                                <a href="{{ route('edit.school', $school->id) }}" class="btn btn-warning">Edit</a>
                                                <a href="{{ route('delete.school', $school->id) }}" class="btn btn-danger" id="delete">Delete</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>School Type</td>
                                            <td>
                                                <select name="school_type" required>
                                                    <option value="">Select School Type</option>
                                                    <option value="Boarding" {{ $school->school_type == 'Boarding' ? 'selected' : '' }}>Boarding</option>
                                                    <option value="Day/Boarding" {{ $school->school_type == 'Day/Boarding' ? 'selected' : '' }}>Day/Boarding</option>
                                                    <option value="Day School" {{ $school->school_type == 'Day School' ? 'selected' : '' }}>Day School</option>
                                                </select>
                                            </td>
                                            <td>
                                                <a href="{{ route('edit.school', $school->id) }}" class="btn btn-warning">Edit</a>
                                                <a href="{{ route('delete.school', $school->id) }}" class="btn btn-danger" id="delete">Delete</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Gender Classification</td>
                                            <td>
                                                <select name="gender_classification" required>
                                                    <option value="">Select Gender Classification</option>
                                                    <option value="Boys School" {{ $school->gender_classification == 'Boys School' ? 'selected' : '' }}>Boys School</option>
                                                    <option value="Girls School" {{ $school->gender_classification == 'Girls School' ? 'selected' : '' }}>Girls School</option>
                                                    <option value="Mixed School" {{ $school->gender_classification == 'Mixed School' ? 'selected' : '' }}>Mixed School</option>
                                                </select>
                                            </td>
                                            <td>
                                                <a href="{{ route('edit.school', $school->id) }}" class="btn btn-warning">Edit</a>
                                                <a href="{{ route('delete.school', $school->id) }}" class="btn btn-danger" id="delete">Delete</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Religion Sponsorship</td>
                                            <td>
                                                <select name="religion_sponsorship" required>
                                                    <option value="">Select Religion Sponsorship</option>
                                                    <option value="Catholic" {{ $school->religion_sponsorship == 'Catholic' ? 'selected' : '' }}>Catholic</option>
                                                    <option value="African Inland Church (A.I.C)" {{ $school->religion_sponsorship == 'African Inland Church (A.I.C)' ? 'selected' : '' }}>African Inland Church (A.I.C)</option>
                                                    <option value="S.D.A" {{ $school->religion_sponsorship == 'S.D.A' ? 'selected' : '' }}>S.D.A</option>
                                                    <option value="African Brotherhood Church (A.B.C)" {{ $school->religion_sponsorship == 'African Brotherhood Church (A.B.C)' ? 'selected' : '' }}>African Brotherhood Church (A.B.C)</option>
                                                    <option value="Others" {{ $school->religion_sponsorship == 'Others' ? 'selected' : '' }}>Others</option>
                                                </select>
                                            </td>
                                            <td>
                                                <a href="{{ route('edit.school', $school->id) }}" class="btn btn-warning">Edit</a>
                                                <a href="{{ route('delete.school', $school->id) }}" class="btn btn-danger" id="delete">Delete</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Number of Students</td>
                                            <td>
                                                <input type="number" name="number_of_students" value="{{ $school->number_of_students }}" required>
                                            </td>
                                            <td>
                                                <a href="{{ route('edit.school', $school->id) }}" class="btn btn-warning">Edit</a>
                                                <a href="{{ route('delete.school', $school->id) }}" class="btn btn-danger" id="delete">Delete</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Number of Teachers</td>
                                            <td>
                                                <input type="number" name="number_of_teachers" value="{{ $school->number_of_teachers }}" required>
                                            </td>
                                            <td>
                                                <a href="{{ route('edit.school', $school->id) }}" class="btn btn-warning">Edit</a>
                                                <a href="{{ route('delete.school', $school->id) }}" class="btn btn-danger" id="delete">Delete</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>School Zone</td>
                                            <td>
                                                <select name="school_zone" required>
                                                    <option value="">Select School Zone</option>
                                                    <option value="Mulala" {{ $school->school_zone == 'Mulala' ? 'selected' : '' }}>Mulala</option>
                                                    <option value="Ithumba" {{ $school->school_zone == 'Ithumba' ? 'selected' : '' }}>Ithumba</option>
                                                    <option value="Mutyambua" {{ $school->school_zone == 'Mutyambua' ? 'selected' : '' }}>Mutyambua</option>
                                                    <option value="Kalamba" {{ $school->school_zone == 'Kalamba' ? 'selected' : '' }}>Kalamba</option>
                                                    <option value="Matiliku" {{ $school->school_zone == 'Matiliku' ? 'selected' : '' }}>Matiliku</option>
                                                    <option value="Kyemundu" {{ $school->school_zone == 'Kyemundu' ? 'selected' : '' }}>Kyemundu</option>
                                                    <option value="Mweini" {{ $school->school_zone == 'Mweini' ? 'selected' : '' }}>Mweini</option>
                                                </select>
                                            </td>
                                            <td>
                                                <a href="{{ route('edit.school', $school->id) }}" class="btn btn-warning">Edit</a>
                                                <a href="{{ route('delete.school', $school->id) }}" class="btn btn-danger" id="delete">Delete</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>School Phone Number</td>
                                            <td>
                                                <input type="text" name="school_phone" value="{{ $school->school_phone }}" required>
                                            </td>
                                            <td>
                                                <a href="{{ route('edit.school', $school->id) }}" class="btn btn-warning">Edit</a>
                                                <a href="{{ route('delete.school', $school->id) }}" class="btn btn-danger" id="delete">Delete</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Upload Documents</td>
                                            <td>
                                                <input type="file" name="documents[]" multiple>
                                            </td>
                                            <td>
                                                <a href="{{ route('edit.school', $school->id) }}" class="btn btn-warning">Edit</a>
                                                <a href="{{ route('delete.school', $school->id) }}" class="btn btn-danger" id="delete">Delete</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Short Message</td>
                                            <td>
                                                <textarea name="chat_message" rows="3">{{ $school->chat_message }}</textarea>
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
