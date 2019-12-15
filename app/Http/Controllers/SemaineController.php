<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{User, Semaine};
use Auth;
use Carbon\Carbon;

class SemaineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $now = Carbon::now();
        $currentWeek = $now->year . "-W" . $now->week;
        $semaines = Semaine::all()->where('dateSemaine', $currentWeek);
        return view('semaine/index', ['semaines' => $semaines, 'now' => $now, 'currentWeek' => $currentWeek]);
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
        foreach ($request->input('typeSemaine') as $user => $typeSemaine) {
            $semaine = new Semaine;
            $semaine->user_id = $user;
            $semaine->typeSemaine = $typeSemaine;
            $semaine->dateSemaine = $request->input('dateSemaine');
            $semaine->save();
        }
        return redirect('semaine/create')->with('success', 'Semaine créée avec succès');
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
