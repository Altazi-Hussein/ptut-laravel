<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{User, Semaine};
use Auth;

class SemaineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('semaine/create', ['users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    $users = User::all();
    foreach ($users as $user)
     {
        /* $type = new Type;
        $type->nom = $r->input('nom');
        $type->heureDebut = $r->input('heureDebut');
        $type->heureFin = $r->input('heureFin');
        $type->save(); */
         $semaine = new Semaine;
         $semaine->user_id = $user->id;
         $semaine->typeSemaine = $request->input('typeSemaine');
         $semaine->dateSemaine = $request->input('dateSemaine');
         $semaine->save();
     }
     return view('semaine/create');
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
