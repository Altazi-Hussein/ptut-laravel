<?php

namespace App\Http\Controllers;

use App\Rdv;
use App\Http\Requests\RdvRequest;

class RdvController extends Controller
{
    public function getForm(){
        return view('ajoutRdv');
    }

    public function postForm(RdvRequest $r){
        $rdv = new Rdv;
        $rdv->raison = $r->input('raison');
        $rdv->patient = $r->input('patient');
        $rdv->save();

        return view('rdvAjoute');
    }
}
