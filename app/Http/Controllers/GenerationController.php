<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\{Type, Rdv, User};
use DateTime;

class GenerationController extends Controller
{
    public $infP;
    public $infG; 

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
     
    public function __construct()
    {
        $this->infG = User::where('id', '=','1')->first();
        $this->infP = User::where('id', '=','2')->first();
        $this->middleware('auth');
    }
    public static function affecter(Rdv $rdv, User $user, $indexOrdre)
    {
        $date = new DateTime('tomorrow');
        //DB::update('update rdvs set user_id = ?, start_time = ? where id = $idRDV', [$idUser, $date, $idRDV]);
        //$rdv->update(['user_id' => $user->id, 'start_time' => $date]); 
        DB::table('rdvs')->where('id',$rdv->id)->update(['user_id' => $user->id, 'start_time' => $date, 'ordre'=> $indexOrdre]);
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {  
        $secteur1 = array( 1 =>"bramans", 2 =>"aussois", 3 => "avrieux", 4 =>"villarodin", 5 =>"bourget", 6 =>"modane" );
        $secteur2 = array( 1 =>"la praz",2 =>"saint andré", 3 =>"freney",  4 =>"fourneaux");
        $indexOrdre = 0; //ordre d'affectation des RDV
        
        $nbToilettesG = 0;
        
        $nbToilettesP = 0;
        $nbToilette = 0;
        $departInfG=$secteur1[1];
        $departInfP=$secteur2[1];
        
        //On sélectionne les rdv commençant à 7h
        /*$types7h = Type::where('heureDebut', '=', '07:00:00')->get();
        foreach($types7h as $t){
            $r = $t->rdvs;
            foreach($r as $temp){
              $rdvs7h[] = $temp;
          }
        }*/
       
        //Sélection de tout les RDV dans les tableaux rdvMatin et rdvAprem
        $types = Type::orderBy('heureDebut', 'asc')->get(); 
        $i = 0;
        foreach ($types as $type) {
            $r = $type->rdvs;
            foreach ($r as $t) {
                if ($type->nom === "Toilettes") {
                    $nbToilette++;
                }
                if($type->heureDebut <= '12:00:00')
                {
                    $rdvsMatin[$i][] = $t;
                }
                else
                {
                    $rdvsAprem[$i][] = $t;
                }
                
            }
            $i++;
        }
        $moitieToilettes = $nbToilette/2;
        echo $nbToilette;
        echo "a".$moitieToilettes;
        
        //Affectation des RDV du matin
        $a = true;
        foreach ($rdvsMatin as $tabRdv) {
            foreach($tabRdv as $rdv)
            {
             
                if($a== true) //Inf grosse semaine
                {
                    if(($rdv->type->nom != "Toilettes") || ($rdv->type->nom == "Toilettes" && $nbToilettesG < $moitieToilettes))  
                    {
                        GenerationController::affecter($rdv, $this->infG, $indexOrdre);
                        $indexOrdre++;
                        if($rdv->type->nom == "Toilettes"){$nbToilettesG++;} //Si c'est une toilette, on incrémente le nombre de toilettes
                    }
                    $a = false;
                }
                
                else //Inf petite semaine
                {
                    
                    if(($rdv->type->nom != "Toilettes") || ($rdv->type->nom == "Toilettes" && $nbToilettesG < $moitieToilettes))
                    {
                        GenerationController::affecter($rdv, $this->infP, $indexOrdre);
                        $indexOrdre++;
                        if($rdv->type->nom == "Toilettes"){$nbToilettesP++;} //Si c'est une toilette, on incrémente le nombre de toilettes
                    }
                    $a = true;
                }
            }
        }

        //Affectation des RDV de l'après midi
        foreach($rdvsAprem as $tabRdv)
        {
            foreach($tabRdv as $rdv)
            {
                GenerationController::affecter($rdv, $this->infG, $indexOrdre);
                $indexOrdre++;
            }
        }
        echo "a".$nbToilettesG;
        echo "a".$nbToilettesP;
        return redirect('/generation/view');
    }

    public function affichage()
    {
        $rdvsP = $this->infP->rdvs;
        $rdvsG = $this->infG->rdvs;
        //$comment = App\Post::find(1)->comments()->where('title', 'foo')->first();
        //Recup les patients 
        return view('planning', ['rdvsP'=> $rdvsP, 'rdvsG'=>$rdvsG]); //Donner les patients au lieu des RDV
    }
}