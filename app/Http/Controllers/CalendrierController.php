<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalendrierController extends Controller
{
    public function show()
    {
        return view('calendrier');
    }
}
