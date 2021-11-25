<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $guarded = [];

    // protected $fillable = [
    //     'first_name',
    //     'last_name',
    //     'username',
    //     'email',
    //     'mobile',
    //     'age',
    //     'blood_group',
    //     'address',
    //     'gender',
    //     'role',
    //     'profile_image',
    //     'password',
    //     'degree',
    //     'specialization_id',
    //     'hospital_id',
    //     'doctor_id',
    //     'from',
    //     'to',
    //     'visiting_charge',
    //     'status',
    // ];

    // public $timestamps = false;
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];
}
