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
                    <th class="text-center"scope="col">ID Patient</th>
                    <th class="text-center"scope="col">ID User</th>
                    <th class="text-center"scope="col">Date</th>
                  </tr>
               <tbody>
               @foreach ($rdvs as $rdv)
                  <tr>
                     <th class="text-center" scope="row">{{$rdv["id"]}}</th>
                     <td class="text-center">{{$rdv["reason"]}}</td>
                     <td class="text-center">{{$rdv["patient_id"]}}</td>
                     <td class="text-center">{{$rdv["user_id"]}}</td>
                     <td class="text-center">{{$rdv["start_time"]}}</td>
                  </tr>
               @endforeach 
               </tbody>
            </thead>
         </table>
         <a class="btn btn-success float-left" href="{{ route('home') }}">Accueil</a>
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