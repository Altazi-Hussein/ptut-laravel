@extends('layouts.app')

@section('titleContent', 'Liste des rendez-vous')

@section('content')

<div class="card-body" style="">
    @if(Auth::check())
      @if(session('success'))
         <div class="alert alert-success" role="alert">
            {{session('success')}}
         </div>
      @endif
      @isset($types)
      <!--<div class="row justify-content-center">
      <div class="col-md-8">
      <div class="card">
      <div class="card-header" style="background: #e7e6ff; box-shadow: 0px 2px 5px grey;">Liste rendez-vous</div>
      <div class="card-body">-->
         <table class="table table-striped">
            <thead>
                  <tr>
                    <th class="text-center"scope="col">#</th>
                    <th class="text-center"scope="col">Type</th>
                    <th class="text-center"scope="col">Heure de début</th>
                    <th class="text-center"scope="col">Heure de fin</th>
                    <th class="text-center"scope="col">Action</th>
                  </tr>
               <tbody>
               @foreach ($types as $type)
                  <tr>
                     <th class="text-center" scope="row">{{$type->id}}</th>
                     <td class="text-center">{{$type->nom}}</td>
                     <td class="text-center">{{$type->heureDebut}}</td>
                     <td class="text-center">{{$type->heureFin}}</td>
                     <td class="text-center d-flex">
                           {{-- <a class="btn btn-warning btn-sm m-1" href="{{url('type/create')}}">
                              <span class="glyphicon glyphicon-edit"></span>
                           </a> --}}
                        <form action="{{route('type.edit', $type['id']) }}" method="GET">
                                 @csrf
                                 <button type="submit" class="btn btn-warning btn-sm m-1">
                                    <i class="far fa-edit"></i>
                                 </button>
                                 
                        </form>
                        <form action="{{route('type.destroy', $type['id']) }}" method="POST">
                           @csrf
                           @method('DELETE')
                           <button onclick="return confirm('Supprimer ce type?')" type="submit" class="btn btn-danger btn-sm m-1">
                              <i class="far fa-trash-alt"></i> 
                           </button>
                       </form>
                     </td>
                  </tr>
               @endforeach 
               </tbody>
            </thead>
         </table>         
         {{-- Ligne pour les boutons <-Précédent-Suivant-> --}}
         <div class="float-left">{{ $types->links()}}</div>
         <a class="btn btn-success float-right" href="{{url('type/create')}}">Ajouter un type de rendez-vous</a>
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