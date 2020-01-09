<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Validator;
use Auth;
use App\{User, Rdv};

class CalendrierController extends Controller
{
    public function index($id = null)
    {
        
        if($id === null){
            $rdvs = Auth::user()->rdvs;
        }
        else{
            $rdvs = Rdv::where('user_id', $id); 
        }
        $users = User::all();
        return view('beta/calendrier', ['rdvs' => $rdvs, 'users' => $users]);
    }

    public function ajaxUpdate(Request $request)
    {
        $rdv = Rdv::with('patient')->findOrFail($request->rdv);
        $rdv->update($request->all());

        return response()->json(['rdv' => $rdv]);
    }
}
