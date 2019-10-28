@extends('layouts.app')
@section('content')
    @if(Auth::check())
    @isset($rdvs)
       <ul> 
        @foreach ($rdvs as $rdv)
       <li>{{ $rdv }} <a href="{{ route('rdv.show', ['id'=>$rdv->id]) }}">Afficher</a></li>
        @endforeach
       </ul>
       {{ $rdvs->links()}}
    @endisset
    @else
       {{"Vous n'êtes pas connecté !"}}
    @endif
    <a href=" {{ route('home') }}"><input class="btn btn-success" type="button" value="Accueil"></a>
@endsection