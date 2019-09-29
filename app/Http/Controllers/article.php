<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class article extends Controller
{
    public function show($n)
    {
        return view('bonjour')->with('numero', $n);
    }
}
