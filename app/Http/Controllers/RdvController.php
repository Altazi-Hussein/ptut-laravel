<?php

namespace App\Http\Controllers;

use App\Rdv;
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
    public function create()
    {
        return view('rdv/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\RdvRequest  $r
     * @return \Illuminate\Http\Response
     */
    public function store(RdvRequest $r)
    {
        $rdv = new Rdv;
        $rdv->raison = $r->input('raison');
        $rdv->patient = $r->input('patient');
        $rdv->save();

        return view('rdv/store');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
