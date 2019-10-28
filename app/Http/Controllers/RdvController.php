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

    public function createSelection()
    {
        $patients = DB::select('select * from Patients');
        $names = [];
        foreach($patients as $patient)
        {
            $names[$patient->id] = $patient->lastName;
        }

        return view('rdv/createSelection', ['names' => $names]);
    }

    public function createCreation()
    {
        return view('rdv/createCreation');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\RdvRequest  $r
     * @return \Illuminate\Http\Response
     */
    public function storeSelection(RdvRequest $r)
    {
        $rdv = new Rdv;
        $rdv->reason = $r->input('raison');
        $rdv->patient_id =$r->input('patient'); 
        $rdv->save();

        return view('rdv/storeResultat');
    }

    public function storeCreation(RdvRequest $r)
    {
        $rdv = new Rdv;
        $patient = new Patient;
        $patient->lastname = $r->input('lastName');
        $patient->firstname = $r->input('firstName');
        $patient->save(); 
        $rdv->raison = $r->input('raison');
        
        $rdv->save();

        return view('rdv/store');
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
