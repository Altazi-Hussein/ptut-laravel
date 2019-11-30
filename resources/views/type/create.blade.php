@extends('layouts.app')
@section('content')
    @if(Auth::check())
    @isset($rdv)
       {{ $rdv }}
    @endisset
    @else
       {{"Vous n'êtes pas connecté !"}}
    @endif
    <a class="btn btn-success" href="{{ url('home') }}">Accueil</a>
@endsection