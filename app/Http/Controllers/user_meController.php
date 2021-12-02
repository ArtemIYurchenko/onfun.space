<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class user_me extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    
}
