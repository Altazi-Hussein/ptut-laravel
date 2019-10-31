{{--@extends('template')--}}
@extends('layouts.app')

@section('titleContent', 'Ajouter un rendez-vous')

@section('content')
<div class="card-body" style="">
                @if(Auth::check())
                    <!-- choix de l'option : choisir un patient existant ou en créer un nouveau -->
<<<<<<< HEAD
                    <a href= {{url('rdv/createSelection')}}> Selectionner un patient existant </a>
                    <br>
                    <a href={{url('rdv/createCreation')}}> Créer un nouveau patient </a>
=======
                    <a href= {{url('rdv/createSelection')}}><input class="btn btn-success p-3 mt-2" type="button" value="Selectionner un patient existant"></a>
                    <a href={{url('rdv/createCreation')}}><input class="btn btn-success p-3 mt-2" type="button" value="Créer un nouveau patient"></a>
>>>>>>> 62964a9e5bfc832e60ffda7bba48dd7af8adea98
                
                @else
                    {{'Vous n\'êtes pas connecté !'}}
                @endif
                    
                
                <div class="footer">
                    <a href="{{ route('home') }}"><input class="btn bg-primary p-2 mt-2 text-light" type="button" value="Retour">
                </div>
            </div>
</div>
@endsection
