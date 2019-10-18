@extends('template')
@section('body')
    rendez-vous ajouté
    <a href="{{ route('rdv/') }}"><input class="btn btn-success" type="button" value="Voir les rendez-vous"></a>
@endsection