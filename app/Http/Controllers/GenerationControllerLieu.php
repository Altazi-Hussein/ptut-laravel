<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Type;

class GenerationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $secteur1 = array("bramans" => 1, "aussois" => 2, "avrieux" =>3 , "villarodin" => 4, "bourget" => 5, "modane" =>6 );
    private $secteur2 = array("la praz"=> 1, "saint andré" =>2 , "freney" => 3, "fourneaux" => 4);

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
        $infG = 1; //Secteur 1
        $departInfG=$secteur1["bramans"];
        $nbToilettesG = 0;
        $infP = 2; //Secteur 2
        $departInfP=$secteur1["la praz"];
        $nbToilettesP = 0;

        //On sélectionne les rdv commençant à 7h
        $types7h = Type::where('heureDebut', '=', '07:00:00')->get();
        foreach($types7h as $t){
            $r = $t->rdvs;
            foreach($r as $temp){
              $rdvs7h[] = $temp;
          }
        }

        $tousRdvVille = Rdv::->where('heure=7h' && (ville = 1 order by id asc))

        //On sélectionne les toilettes et les pansements(10h)
        $types10h = Type::where('heureDebut', '=', '10:00:00')->get();
        foreach($types10h as $t){
            $r = $t->rdvs;
            foreach($r as $temp){
              $rdvs10h[] = $temp;
          }
        }
        
        
        //On calcule la moitié du nombre de toilettes pour les équilibrer plus tard
        $moitieToilette = count($rdvs10h)/2;

        foreach($rdvs10h as $rdv)
        {
            $a = true; 
            if($a== true) //Inf grosse semaine
            {
                if($rdv->type != 6 || $nbToilettesG < $moitieToilette)  // /!\Pas dynamique car on rentre le type en dur
                {
                    affecter($rdv->id, $infG);
                    if($rdv->type == 6){$nbToiletteG++;} //Si c'est une toilette, on incrémente le nombre de toilettes
                }
                $a = false;
            }
            
            else //Inf petite semaine
            {
                if($rdv->type != 6 || $nbToilettesP < $moitieToilette)
                {
                    affecter($rdv->id, $infP);
                    if($rdv->type == 6){$nbToiletteP++;} //Si c'est une toilette, on incrémente le nombre de toilettes
                }
                $a = true;
            }
        }
        
        
        return view('generation', ['rdvs7h'=>$rdvs7h, 'rdvs10h' => $rdvs10h]);
        
        
        

    }

    public function affecter($idRDV, $idUser)
    {
        $date = new DateTime('tomorrow');
        DB::update('update rdvs set user_id = ?, start_time = ? where id = $idRDV', [$idUser, $date, $idRDV]); 
    }

}