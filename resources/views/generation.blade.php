@extends('layouts.app')
@section('content')
    @if(Auth::check())
        {{count($rdvs7h)}}
        @foreach($rdvs7h as $rdv)
   
        @endforeach
    @else
       {{"Vous n'êtes pas connecté !"}}
    @endif
    <a class="btn btn-success" href="{{ url('home') }}">Accueil</a>
@endsection