{{--@extends('template')--}}
@extends('layouts.app')

@section('titleContent', 'Ajouter un rendez-vous')

@section('content')
<div class="card-body" style="">
    <form class="d-flex flex-column">
                @if(Auth::check())
                    <!-- choix de l'option : choisir un patient existant ou en créer un nouveau -->
                    <a class="btn btn-success p-3 mt-2" href= {{url('rdv/createSelection')}}>Selectionner un patient existant</a>
                    <a class="btn btn-success p-3 mt-2" href={{url('rdv/createCreation')}}>Créer un nouveau patient</a>
                
                @else
                    {{'Vous n\'êtes pas connecté !'}}
                @endif
        </form>
                {{-- <div class="footer">
                
                </div> --}}
            </div>
 <a class="btn bg-primary p-2 mt-2 text-light" href="{{ route('home') }}">Accueil</a>

@endsection
