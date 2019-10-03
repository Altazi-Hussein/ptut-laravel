<?php

namespace App\Http\Controllers;

use App\Patient;
use App\Http\Requests\PatientRequest;

class PatientController extends Controller
{
    public function getForm(){
        return view('patient');
    }

    public function postForm(PatientRequest $r){
        $patient = new Patient;
        $patient->nom = $r->input('nom');
        $patient->prenom = $r->input('prenom');
        $patient->save();
        

        return view('patientAjoute');
    }
}
