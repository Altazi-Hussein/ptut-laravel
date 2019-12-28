@extends('layouts.app')
@section('content')
    @if(Auth::check())
        @foreach($rdvs7h as $rdv)
    {{ /*$rdv->patient_id */}}
        @endforeach
    @else
       {{"Vous n'êtes pas connecté !"}}
    @endif
    <a class="btn btn-success" href="{{ url('home') }}">Accueil</a>
@endsection