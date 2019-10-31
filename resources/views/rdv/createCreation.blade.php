{{--@extends('template')--}}
@extends('layouts.app')

@section('titleContent', 'Ajouter un rendez-vous')

@section('content')
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
                {!! Form::text('lastName', null, ['class' => 'form-control mb-2', 'placeholder' => 'Nom de famille du patient', 'id' => 'patient']) !!}
                {!! Form::text('firstName', null, ['class' => 'form-control mb-2', 'placeholder' => 'Prénom du patient']) !!} 
                {!! Form::submit('Envoyer !', ['class' => 'btn btn-success mt-2']) !!}
            {!! Form::close() !!}
        @endif

        @if ($errors->any())
            <div class="error">
                <ul>
                    @foreach ($errors->all() as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            
    </div>
    @endsection
