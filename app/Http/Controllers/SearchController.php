<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rdv;
use App\Http\Resources\RdvCollection;

class SearchController extends Controller
{
    public function index()
    {
        return view('beta.index');
    }
    public function action(Request $r)
    {
        if($r->ajax())
        {
            $query = $r->input('query');
            //return new RdvCollection(Rdv::search($query)->get());
            $rdvs = Rdv::search($query)->get();
            $output = <<<WOW
            <table class='table table-striped'>
            <thead>
                  <tr>
                    <th class="text-center"scope="col">#</th>
                    <th class="text-center"scope="col">Raison</th>
                    <th class="text-center"scope="col">Patient</th>
                    <th class="text-center"scope="col">Infirmière</th>
                    <th class="text-center"scope="col">Date</th>
                  </tr>
               <tbody>
WOW;
            foreach ($rdvs as $rdv){
                $output .= <<<WOW
                <tr>
                    <th class="text-center" scope="row">{$rdv->id}</th>
                    <td class="text-center">{$rdv->reason}</td>
                    <td class="text-center">{$rdv->patient->firstName} {$rdv->patient->lastName}</td>
WOW;
                    if (!empty($rdv->user)){
                        $output .="
                     <td class='text-center'>{$rdv->user->name}</td>";
                    }
                    else{
                        $output .='
                        <td class="text-center">Personne</td>';
                    }
                  $output .="</tr>";
            }
            $output .= "
               </tbody>
            </thead>
         </table>";
            return $output;
        }
        else
        {
            return 'no';
        }
    }
    public function search(Request $r)
    {
        $rdvs = Rdv::search($r->input('dunno'))->paginate(15);
        return view('beta.index', ['rdvs' => $rdvs]);
    }
}
