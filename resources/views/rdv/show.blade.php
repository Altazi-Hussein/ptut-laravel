@extends('template')
@section('contenu')
    @if(Auth::check())
    @isset($rdv)
       {{ $rdv }}
    @endisset
    @else
       {{"Vous n'êtes pas connecté !"}}
    @endif
    <a href="{{ url('home') }}"><input class="btn btn-success" type="button" value="Accueil"></a>
@endsection