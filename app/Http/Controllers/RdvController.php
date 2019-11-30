<?php

namespace App\Http\Controllers;

use App\{Rdv, Patient, Type};
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Http\Requests\RdvRequestSelection;
use App\Http\Requests\RdvRequestCreation;



class RdvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rdvs = Rdv::simplePaginate(15);
        return view('rdv/index', ['rdvs' => $rdvs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $types = Type::all();
        return view('rdv/create', ['types' => $types]);
    }
    
    
    //Création d'un nouveau RDV via un patient existant
    public function store(Request $r)
    {
        $typeRdvRequest = $r->validate([
            'styleDeRDV' => 'required',
        ]);
        $rdv = new Rdv;
        if($r->input('styleDeRDV') == 'selectionPatient'){
            $r->validate((new RdvRequestSelection)->rules());
            $rdv->type_id = $r->input('type');
            $rdv->patient_id = $r->input('patient');
        } 
        else{
            $r->validate((new RdvRequestCreation)->rules());
            $patient = new Patient;
            $patient->lastname = $r->input('lastName');
            $patient->firstname = $r->input('firstName');
            $patient->save(); 
            $rdv->type_id = $r->input('type');
            $rdv->patient_id = $patient->id;
        }
        $rdv->save();

        return redirect('rdv/create')->with('success', 'Rendez-vous ajouté avec succès !');
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
