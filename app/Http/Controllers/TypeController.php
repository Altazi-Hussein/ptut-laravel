<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Rdv, Patient, Type};
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\TypeRdvRequest;

class TypeController extends Controller
{
    public function index()
    {
        $types = Type::simplePaginate(15);
        return view('type/index', ['types' => $types]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('type/create')->with('success', 'Type ajouté avec succès');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TypeRdvRequest $r)
    {
        $type = new Type;
        $type->nom = $r->input('nom');
        $type->heureDebut = $r->input('heureDebut');
        $type->heureFin = $r->input('heureFin');
        $type->save();

        return view('/type/create')->with('success', 'Type ajouté avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('type.show', ['type' => Type::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $type = Type::findOrFail($id);
        return view('type/edit', ['type' => $type]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TypeRdvRequest $request, $id)
    {
        Type::where('id', $id)->update($request->except('_token', '_method'));
        return redirect('type/')->with('success', 'Type modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $type = Type::find($id);
        $type->delete();
        return redirect('/type')->with('success', 'Type supprimé');
    }
}
