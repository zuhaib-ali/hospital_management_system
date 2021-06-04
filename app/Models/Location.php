<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Location extends Model
{
    use HasFactory, softDeletes;

    protected $fillable = [
        'city'
    ];
}
