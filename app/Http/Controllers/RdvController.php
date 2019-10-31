<?php

namespace App\Http\Controllers;

use App\Rdv;
use App\Patient;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Http\Requests\RdvRequest;



class RdvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rdvs = Rdv::simplePaginate(20);
        return view('rdv/index', ['rdvs' => $rdvs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $requestMethodePatient)
    {
        return view('rdv/create');
    }
    
    //Formulaire de création d'un RDV via un patient existant
    public function createSelection()
    {
        $patients = Patient::all();

        return view('rdv/createSelection', ['patients' => $patients]);
    }

    //Formulaire de création de RDV via un nouveau patient
    public function createCreation()
    {
        return view('rdv/createCreation');
    }
    
    //Création d'un nouveau RDV via un patient existant
    public function storeSelection(RdvRequest $r)
    {
        $rdv = new Rdv;
        $rdv->reason = $r->input('raison');
        $rdv->patient_id =$r->input('patient'); 
        $rdv->save();

        return view('rdv/storeResultat');
    }

    //Creation d'un nouveau RDV via un nouveau patient
    public function storeCreation(Request $r)
    {
        $rdv = new Rdv;
        $patient = new Patient;
        $patient->lastname = $r->input('lastName');
        $patient->firstname = $r->input('firstName');
        $patient->save(); 
        $rdv->reason = $r->input('raison');
        $rdv->patient_id = $patient->id;
        
        $rdv->save();

        return view('rdv/storeResultat');
    }

    public function storeResultat()
    {
        return view('rdv/storeResultat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('rdv.show', ['rdv' => Rdv::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('rdv.edit', ['rdv' => Rdv::findOrFail($id)] ); //Vue a faire plus tard 

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
