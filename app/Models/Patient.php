<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = [];

    protected function getNameAttribute($name){
        return ucwords($name);
    }

    protected function getSexAttribute($sex){
        return ucfirst($sex);
    }

    protected function getBloodGroupAttribute($blood_group){
        return ucwords($blood_group);
    }

    protected function getAddressAttribute($address){
        return ucfirst($address);
    }

    protected function getDoctorAttribute($doctor){
        return ucfirst($doctor);
    }    

    protected function getStatusAttribute($status){
        return ucfirst($status);
    }    
}
