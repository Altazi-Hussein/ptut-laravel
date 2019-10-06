@extends('template')
@section('contenu')
    @if(Auth::check())
    @isset($rdvs)
       <ul> 
        @foreach ($rdvs as $rdv)
       <li>{{ $rdv }}</li>
        @endforeach
       </ul>
       {{ $rdvs->links()}}
    @endisset
    @else
       {{"Vous n'êtes pas connecté !"}}
    @endif
    <a href="/home"><input class="btn btn-success" type="button" value="Accueil"></a>
@endsection