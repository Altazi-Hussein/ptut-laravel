@extends('layouts.app')
@section('content')
    <p> Rendez-vous ajouté avec succès ! </p>
    <br>
    <a href="{{ url('rdv') }}"><input class="btn btn-success" type="button" value="Voir les rendez-vous"></a>
    <br>
    <a href={{url('/')}}><input class="btn btn-success" type="button" value="Retour à l'accueil"></a>
@endsection