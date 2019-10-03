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
@endsection