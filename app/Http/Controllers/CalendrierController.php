<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rdv;

class CalendrierController extends Controller
{
    public function index()
    {
        $rdvs = Rdv::all();
        $patient = new \App\Patient;
        return view('beta/calendrier', compact('rdvs','patient'));
    }
}
