@extends('layouts.app')

@section('titleContent', 'Rendez-vous ajouté avec succès !')

@section('content')
<div class="card-body" style="">
{{--     <p class="bg-success text-white text-center"> Rendez-vous ajouté avec succès ! </p> --}}
<form class="d-flex flex-column">
    <a class="btn btn-success p-3 mt-2" href="{{ url('rdv') }}">Voir les rendez-vous</a>
    <a class="btn btn-success p-3 mt-2" href="{{url('rdv/create') }}">Ajouter un autre rendez-vous</a>
    <a class="btn btn-success p-3 mt-2" href="{{url('calendrier') }}">Accéder au calendrier</a>
</form>
</div>
<a class="btn btn-primary p-2 mt-2" href={{url('/')}}>Retour à l'accueil</a>
@endsection