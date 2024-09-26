<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SecondarySchool extends Model
{
    use HasFactory;

    // Specify the table if it's not the plural of the model name
    protected $table = 'secondary_schools'; // Adjust if necessary

    // Define fillable fields
    protected $fillable = [
        'county',
        'sub_county',
        'constituency',
        'name',
        'tsc_registration_number',
        'kra_pin',
        'nemis_number',
        'number_of_students',
        'number_of_teachers',
        'school_phone',
        'school_logo',
        'documents',
    ];
}
