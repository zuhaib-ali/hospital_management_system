<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getFirstNameAttribute($value){
        return ucfirst($value);
    }

    public function getLastNameAttribute($value){
        return ucfirst($value);
    }

    public function getSpecialistAttribute($value){
        return ucfirst($value);
    }

    public function getHospitalIdAttribute($value){
        return ucfirst($value);
    }

    public function getAddressAttribute($value){
        return ucfirst($value);
    }

    public function getGenderAttribute($value){
        return ucfirst($value);
    }

    public function getDescriptionAttribute($value){
        return ucfirst($value);
    }
}
