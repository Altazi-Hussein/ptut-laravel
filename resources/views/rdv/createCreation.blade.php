{{--@extends('template')--}}
@extends('layouts.app')

@section('titleContent', 'Ajouter un rendez-vous')

@section('content')
@if ($errors->any())
    <div class="error">
        <ul class="bg-danger text-light list-unstyled">
            @foreach ($errors->all() as $item)
                <li class="text-center">{{ $item }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="card-body" style="">
        @if(Auth::check())
            {!! Form::open(['action' => 'RdvController@storeCreation']) !!}
                <label class="col-form-label text-md-right mb-2" for="raison">
                    {{ __('Motif du rendez-vous') }}
                </label>
                {!! Form::text('raison', null, ['class' => 'form-control mb-2', 'placeholder' => 'Motif de rendez-vous', 'id' => 'raison']) !!}
                <label class="col-form-label text-md-right mb-2" for="patient">
                    {{ __('Ajout du patient') }}
                </label>
                {!! Form::text('lastName', null, ['class' => 'form-control mb-2', 'placeholder' => 'Nom de famille du patient', 'id' => 'nomPatient']) !!}
                {!! Form::text('firstName', null, ['class' => 'form-control mb-2', 'placeholder' => 'Prénom du patient'], 'id' => 'prenomPatient') !!} 
                {!! Form::submit('Ajouter', ['class' => 'btn btn-success mt-2 float-right']) !!}
            {!! Form::close() !!}
        @endif

        {{-- @if ($errors->any())
            <div class="error">
                <ul>
                    @foreach ($errors->all() as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>
        @endif --}}
            
    </div>
    <a class="btn btn-primary float-left" href="{{ route('rdv.create') }}">Retour</a>
    @endsection
