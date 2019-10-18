<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rdv;

class CalendrierController extends Controller
{
    public function index()
    {
        $rdvs = Rdv::all();
        return view('beta/calendrier', compact('rdvs'));
    }
    public function ajaxUpdate(Request $request)
    {
        $rdv = Rdv::with('patient')->findOrFail($request->rdv);
        $rdv->update($request->all());

        return response()->json(['rdv' => $rdv]);
    }
}
