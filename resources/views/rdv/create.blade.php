{{--@extends('template')--}}
@extends('layouts.app')

@section('titleContent', 'Ajouter un rendez-vous')

@section('content')
<div class="card-body" style="">
                @if(Auth::check())
                    <!-- choix de l'option : choisir un patient existant ou en créer un nouveau -->
                    <a href= {{url('rdv/createSelection')}}> Selectionner un patient existant </a>
                    <br>
                    <a href={{url('rdv/createCreation')}}> Créer un nouveau patient </a>
                
                @else
                    {{'Vous n\'êtes pas connecté !'}}
                @endif
                    
                
                <div class="footer">
                    <a href="{{ route('home') }}"><input class="btn bg-primary p-2 mt-2 text-light" type="button" value="Retour">
                </div>
            </div>
</div>
@endsection
