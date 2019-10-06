@extends('template')
@section('contenu')
    @isset($rdvs)
       <ul> 
        @foreach ($rdvs as $rdv)
       <li>{{ $rdv }}</li>
        @endforeach
       </ul>
       {{ $rdvs->links()}}
    @endisset
    <a href="/home"><input class="btn btn-success" type="button" value="Accueil"></a>
@endsection