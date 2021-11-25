<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    public $timestamps = false;
    
    protected  $fillable = [
        'name',
        'email',
        'address',
        'phone',

    ];
    
    public function doctors(){
        return $this->hasMany(Doctor::class);
    }
}
