@extends('layouts.app')

@section('titleContent', 'Liste des rendez-vous')

@section('content')
{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
 --}}
<div class="card-body" style="">
    @if(Auth::check())
      @if(session('success'))
      <div class="alert alert-success" role="alert">
       {{session('success')}}
      </div>
      @endif
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
                    <th class="text-center"scope="col">Actions</th>
                  </tr>
               <tbody>
               @foreach ($rdvs as $rdv)
                  <tr>
                     <th class="text-center" scope="row">{{$rdv->id}}</th>
                     <td class="text-center">{{$rdv->type->nom}}</td>
                     <td class="text-center">{{$rdv->patient->firstName}} {{$rdv->patient->lastName}}</td>
                     @if (!empty($rdv->user))
                     <td class="text-center">{{$rdv->user->name}}</td>
                     @else
                     <td class="text-center">Personne</td>
                     @endif
                     <td class="text-center d-flex">
                        <form action="{{route('rdv.edit', $rdv['id']) }}" method="GET">
                                 @csrf
                                 <button type="submit" class="btn btn-warning btn-sm m-1">
                                    <i class="far fa-edit"></i> 
                                 </button>
                        </form>
                        <form action="{{route('rdv.destroy', $rdv['id']) }}" method="POST">
                           @csrf
                           @method('DELETE')
                           <button onclick="return confirm('Supprimer ce rendez-vous?')" type="submit" class="btn btn-danger btn-sm m-1">
                              <i class="far fa-trash-alt"></i> 
                           </button>
                       </form>
                     </td>
                     {{-- <td class="text-center">{{$rdv->start_time}}</td> --}}
                  </tr>
               @endforeach 
               </tbody>
            </thead>
         </table>         
         <a class="btn btn-success p-3 mt-2 float-right" href="{{url('rdv/create')}}">Ajouter un rendez-vous</a>
         <div class="float-left">{{ $rdvs->links()}}</div>
    @endisset
    @else
       {{"Vous n'êtes pas connecté !"}}
    @endif
</div>
<a class="btn btn-primary float-left" href="{{ route('home') }}">Retour</a>
@endsection