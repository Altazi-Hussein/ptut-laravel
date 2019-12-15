@extends('layouts.app')

@section('titleContent', 'Semaine actuelle')

@section('content')
<div class="card-body" style="">
    @if(Auth::check())
      @if(session('success'))
         <div class="alert alert-success" role="alert">
            {{session('success')}}
         </div>
      @endif
      @isset($semaines)
         <table class="table table-striped">
            <thead>
                  <tr>
                    <th class="text-center"scope="col">Infirmière</th>
                    <th class="text-center"scope="col">Type de semaine</th>
                  </tr>
               <tbody>
               @foreach ($semaines as $semaine)
                  <tr>
                     <td class="text-center" scope="row">{{$semaine->user->name}}</td>
                     <td class="text-center">
                        @if ($semaine->typeSemaine == 'petite')
                            {{'Petite semaine'}} 
                        @elseif ($semaine->typeSemaine == 'grosse')
                            {{'Grosse semaine'}}
                        @elseif ($semaine->typeSemaine == 'permanence')
                            {{'Permanence'}}                         
                        @endif
                     </td>
                  </tr>
               @endforeach 
               </tbody>
            </thead>
         </table>         
         {{-- Ligne pour les boutons <-Précédent-Suivant-> --}}
         <a class="btn btn-success float-right" href="{{url('type/create')}}">Configurer nouvelle semaine</a>
         {{--<ul> 
        @foreach ($rdvs as $rdv)
       <li>{{ $rdv }} {{--<a href="{{ route('rdv.show', ['id'=>$rdv->id]) }}">Afficher</a></li>
        @endforeach
       </ul>
       {{ $rdvs->links()}}--}}
    @endisset
    @else
       {{"Vous n'êtes pas connecté !"}}
    @endif
      </div>
<a class="btn btn-primary float-left" href="{{ route('home') }}">Retour</a>
@endsection