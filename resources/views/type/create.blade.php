@extends('layouts.app')
@section('titleContent', 'Ajouter un type de rendez-vous')


@section('content')
<div class="card-body" style="">
@if(Auth::check())
@if ($errors->any())
<div class="error">
    <ul>
        @foreach ($errors->all() as $item)
            <li>{{ $item }}</li>
        @endforeach
    </ul>
</div>
@endif

@if(session('success'))
         <div class="alert alert-success" role="alert">
            {{session('success')}}
         </div>
@endif
{!! Form::open(['action' => 'TypeController@store']) !!}
<label class="col-form-label text-md-right mb-2" for="nameType">
        {{ __('Ajouter un type de rendez-vous') }}
</label> 
{!! Form::text('nom', null, ['class' => 'form-control mb-2', 'placeholder' => 'Nom du motif', 'id' => 'nameType']) !!}
<label class="col-form-label text-md-right mb-2" for="starting_at">
        {{ __('Contrainte d\'heure de début du rendez-vous') }}
</label>
{!! Form::time('heureDebut', null, ['class' => 'form-control mb-2', 'placeholder' => 'Heure de début (faculattif)', 'id' => 'starting_at']) !!}


<label class="col-form-label text-md-right mb-2" for="ending_at">
        {{ __('Contrainte d\'heure maximale du rendez-vous') }}
</label>
{!! Form::time('heureFin', null, ['class' => 'form-control mb-2', 'placeholder' => 'Horaire maximum possible', 'id' => 'ending_at']) !!}

{!! Form::submit('Ajouter le type', ['class' => 'btn btn-success mt-2 float-right']) !!}
{!! Form::close() !!}
<a class="btn btn-primary" href="{{ route('type.index') }}">Liste des types</a>
@endif
</div>
    <a class="btn btn-primary" href="{{ URL::previous() }}">Retour</a>
@endsection