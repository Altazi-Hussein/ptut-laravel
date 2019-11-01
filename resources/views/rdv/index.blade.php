@extends('layouts.app')

@section('titleContent', 'Liste des rendez-vous')

@section('content')
<div class="card-body" style="">
    @if(Auth::check())
      @isset($rdvs)
      <!--<div class="row justify-content-center">
      <div class="col-md-8">
      <div class="card">
      <div class="card-header" style="background: #e7e6ff; box-shadow: 0px 2px 5px grey;">Liste rendez-vous</div>
      <div class="card-body">-->
         <table class="table table-striped">
            <thead>
                  <tr>
                    <th class="text-center"scope="col">#</th>
                    <th class="text-center"scope="col">Raison</th>
                    <th class="text-center"scope="col">Patient</th>
                    <th class="text-center"scope="col">Infirmière</th>
                    <th class="text-center"scope="col">Date</th>
                  </tr>
               <tbody>
               @foreach ($rdvs as $rdv)
                  <tr>
                     <th class="text-center" scope="row">{{$rdv->id}}</th>
                     <td class="text-center">{{$rdv->reason}}</td>
                     <td class="text-center">{{$rdv->patient->firstName}} {{$rdv->patient->lastName}}</td>
                     <td class="text-center">{{$rdv->user->name}}</td>
                     <td class="text-center">{{$rdv->start_time}}</td>
                  </tr>
               @endforeach 
               </tbody>
            </thead>
         </table>
         <a class="btn btn-primary float-left" href="{{ route('home') }}">Retour</a>
         
         {{-- Ligne pour les boutons <-Précédent-Suivant-> --}}
         <div class="float-right">{{ $rdvs->links()}}</div>
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
@endsection