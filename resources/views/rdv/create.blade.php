{{--@extends('template')--}}
@extends('layouts.app')

@section('titleContent', 'Ajouter un rendez-vous')

@section('content')
<div class="card-body" style="">
                @if(Auth::check())
                    <!-- choix de l'option : choisir un patient existant ou en créer un nouveau -->
                    <a href= {{url('rdv/createSelection')}}><input class="btn btn-success p-3 mt-2" type="button" value="Selectionner un patient existant"></a>
                    <a href={{url('rdv/createCreation')}}><input class="btn btn-success p-3 mt-2" type="button" value="Créer un nouveau patient"></a>
                
                @else
                    {{'Vous n\'êtes pas connecté !'}}
                @endif
                    
                
                <div class="footer">
                    <a href="{{ route('home') }}"><input class="btn bg-primary p-2 mt-2 text-light" type="button" value="Retour">
                </div>
            </div>
</div>
@endsection
