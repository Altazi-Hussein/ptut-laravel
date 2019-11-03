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
            
            return view('beta.tableSearch', ['rdvs' => $rdvs]);
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
