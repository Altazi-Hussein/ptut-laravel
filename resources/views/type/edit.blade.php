@extends('layouts.app')
@section('titleContent', 'Ajouter un type de rendez-vous')


@section('content')
<div class="card-body" style="">
        @if ($errors->any())
        <div class="error">
            <ul>
                @foreach ($errors->all() as $item)
                    <li>{{ $item }}</li>
                @endforeach
            </ul>
        </div>
    @endif

@if(Auth::check())
{!! Form::model($type, ['route' => ['type.update', $type->id]]) !!}
@method('PATCH')
<label class="col-form-label text-md-right mb-2" for="nameType">
        {{ __('Ajouter un type de rendez-vous') }}
</label> 
{!! Form::text('nom', $type['nom'], ['class' => 'form-control mb-2', 'id' => 'nameType']) !!}
<label class="col-form-label text-md-right mb-2" for="starting_at">
        {{ __('Contrainte d\'heure de début du rendez-vous') }}
</label>
{!! Form::time('heureDebut', $type['heureDebut'], ['class' => 'form-control mb-2', 'id' => 'starting_at']) !!}


<label class="col-form-label text-md-right mb-2" for="ending_at">
        {{ __('Contrainte d\'heure maximale du rendez-vous') }}
</label>
{!! Form::time('heureFin', $type['heureFin'], ['class' => 'form-control mb-2', 'id' => 'ending_at']) !!}

{!! Form::submit('Modifier', ['class' => 'btn btn-success mt-2 float-right p-2']) !!}
{!! Form::close() !!}
@endif
</div>
    <a class="btn btn-primary" href="{{ url('home') }}">Retour</a>
@endsection