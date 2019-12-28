<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class GenerationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //On sélectionne les RDV prioritaires (7h) 
        $type7h = DB::table('types')->where('heureDebut', '=', '07:00:00')->pluck('id');
        $type7h = $type7h->all(); 
        

        $rdvs7h = collect();
        foreach($type7h as $t)
        {
            $rdvs7h->push(DB::select([$t])->all());
        }
        $rdvs7h->all();
        print_r($rdvs7h);

        //On sélectionne les toilettes et les pansements(10h)
        $type10h = DB::table('types')->where('heureDebut', '=', '10:00:00')->pluck('id');
        $type10h = $type10h->all();
       
    
        $rdvs10h = collect();
        foreach($type10h as $t)
        {
            $rdvs10h->push(DB::select([$t])->all());
        }
        $rdvs10h->all();

        //On calcule la moitié du nombre de toilettes pour les équilibrer plus tard
        $moitieToilette = count($rdvs10h)/2;

        /*foreach($rdvs7h as $rdv)
        {
            $a = true; 
            if($a== true) //Inf grosse semaine
            {
                if($rdv->type != )
                affecter($rdv->id,  )
            }
        }*/
        
        
        //return view('generation', ['rdvs7h'=>$rdvs7h, 'rdvs10h' => $rdvs10h]);

    }

    public function affecter($idRDV, $idUser)
    {
        $date = new DateTime('tomorrow');
        DB::update('update rdvs set user_id = ?, start_time = ? where id = $idRDV', [$idUser, $date, $idRDV]); 
    }

}