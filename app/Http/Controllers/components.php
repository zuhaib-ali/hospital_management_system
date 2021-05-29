<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class components extends Controller
{
    //
    public function departments()
    {
        return view('components.departments');
    }
}
