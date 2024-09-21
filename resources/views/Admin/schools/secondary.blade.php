@extends('admin.admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<style>
    body, html {
        height: 100%;
        margin: 0;
        font-family: Arial, sans-serif;
    }
    .page-content {
        display: flex;
        height: 100%;
        background: linear-gradient(to right, #ff7e5f, #feb47b);
        position: relative;
    }
    .left-wrapper {
        flex: 1;
        padding: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .card {
        width: 100%;
        border: none;
        border-radius: 10px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        position: relative;
    }
    .logo {
        position: absolute;
        top: 20px;
        right: 20px;
        width: 90px; /* Increased size for better visibility */
        height: 90px; /* Increased size for better visibility */
        border-radius: 50%;
        overflow: hidden;
        border: 4px solid #FFD700; /* Eye-catching golden border */
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3); /* Shadow for depth */
        background-color: white; /* Background color for contrast */
    }
    .logo img {
        width: 100%;
        height: auto;
    }
    h1 {
        text-align: center;
        font-size: 2.5rem;
        color: white;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        background: linear-gradient(45deg, blue, yellow, red, green, white);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
    .form-group {
        margin-bottom: 15px;
    }
    label {
        font-weight: bold;
        color: #ff4500; /* Eye-catching color for labels */
        display: block;
        margin-bottom: 5px;
        font-size: 1.2rem; /* Increased font size for better visibility */
    }
    .form-control {
        background-color: #e0f7fa; /* Light blue for input background */
        color: #333;
        border: 2px solid #007bff; /* Blue border for inputs */
        padding: 10px;
        border-radius: 5px;
        width: 100%;
        font-size: 1rem; /* Increased font size for inputs */
    }
    .form-control:focus {
        border-color: #ff4500; /* Change border color on focus */
        box-shadow: 0 0 5px rgba(255, 69, 0, 0.5); /* Shadow effect on focus */
    }
    button {
        background-color: #007bff;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        width: 100%;
        margin-top: 10px;
        font-size: 1.2rem; /* Increased font size for button */
    }
    button:hover {
        background-color: #0056b3;
    }
    .chat-point {
        margin-top: 15px;
        background-color: #f8f9fa;
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
    }
    .social-icons {
        display: flex;
        gap: 10px;
    }
    .social-icons a {
        text-decoration: none;
        color: #333;
        font-size: 1.5rem;
    }
</style>

<div class="page-content">
    <div class="left-wrapper">
        <div class="card rounded">
            <div class="logo" id="showImage">
                <img src="" alt="School Logo" id="logoPreview">
            </div>
            <div class="card-body">
                <h1 class="mb-4">Secondary School Information</h1>

                <form action="{{ route('schools.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="school_name">School Name:</label>
                        <input type="text" class="form-control" id="school_name" name="school_name" required value="makueni">
                    </div>

                    <div class="form-group">
                        <label for="school_logo">School Logo:</label>
                        <input type="file" class="form-control" id="school_logo" name="school_logo" accept="image/*" required>
                        <small class="form-text text-muted">Current Logo: pie-chart.jpg</small>
                    </div>

                    <div class="form-group">
                        <label for="tsc_registration_number">TSC Registration Number:</label>
                        <input type="text" class="form-control" id="tsc_registration_number" name="tsc_registration_number" required>
                    </div>

                    <div class="form-group">
                        <label for="kra_pin">KRA PIN:</label>
                        <input type="text" class="form-control" id="kra_pin" name="kra_pin" required>
                    </div>

                    <div class="form-group">
                        <label for="nemis_number">NEMIS Number:</label>
                        <input type="text" class="form-control" id="nemis_number" name="nemis_number" required>
                    </div>

                    <div class="form-group">
                        <label for="school_type">School Type:</label>
                        <select class="form-control" id="school_type" name="school_type" required>
                            <option value="">Select School Type</option>
                            <option value="Boys">Boys</option>
                            <option value="Girls">Girls</option>
                            <option value="Mixed">Mixed</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="boarding_type">Boarding Type:</label>
                        <select class="form-control" id="boarding_type" name="boarding_type" required>
                            <option value="">Select Boarding Type</option>
                            <option value="Day/Boarding">Day/Boarding</option>
                            <option value="Boarding">Boarding</option>
                            <option value="Day">Day</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="number_of_students">Number of Students:</label>
                        <input type="number" class="form-control" id="number_of_students" name="number_of_students" required>
                    </div>

                    <div class="form-group">
                        <label for="number_of_teachers">Number of Teachers:</label>
                        <input type="number" class="form-control" id="number_of_teachers" name="number_of_teachers" required>
                    </div>

                    <div class="form-group">
                        <label for="school_zone">School Zone:</label>
                        <input type="text" class="form-control" id="school_zone" name="school_zone" required>
                    </div>

                    <div class="form-group">
                        <label for="school_division">School Division:</label>
                        <input type="text" class="form-control" id="school_division" name="school_division" required>
                    </div>

                    <div class="form-group">
                        <label for="school_ward">School Ward:</label>
                        <input type="text" class="form-control" id="school_ward" name="school_ward" required>
                    </div>

                    <div class="form-group">
                        <label for="school_phone">School Phone Number:</label>
                        <input type="text" class="form-control" id="school_phone" name="school_phone" required>
                    </div>

                    <div class="form-group">
                        <label for="whatsapp_number">WhatsApp Number:</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fab fa-whatsapp"></i></span>
                            <input type="text" class="form-control" id="whatsapp_number" name="whatsapp_number" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email">Email Address:</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="website">Website:</label>
                        <input type="url" class="form-control" id="website" name="website">
                    </div>

                    <div class="form-group">
                        <label for="documents">Upload Documents:</label>
                        <input type="file" class="form-control" id="documents" name="documents[]" multiple>
                    </div>

                    <div class="chat-point">
                        <label for="chat_message">Chat Point / Short Message:</label>
                        <textarea class="form-control" id="chat_message" name="chat_message" rows="3"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Social Accounts:</label>
                        <div class="social-icons">
                            <a href="#" id="facebook"><i class="fab fa-facebook"></i></a>
                            <a href="#" id="tiktok"><i class="fab fa-tiktok"></i></a>
                        </div>
                    </div>

                    <button type="submit">Submit</button>
                    <button type="button" onclick="window.print();">Print</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function(){
    $('#school_logo').change(function(e){
        var reader = new FileReader();
        reader.onload = function(e){
            $('#logoPreview').attr('src', e.target.result);
        }
        reader.readAsDataURL(e.target.files[0]);
    });
});
</script>

@endsection
