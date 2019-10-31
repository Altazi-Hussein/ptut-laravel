{{--@extends('template')--}}
@extends('layouts.app')

@section('content')
    <div class="head">Ajouter rdv</div>
    <div class="body">
        @if(Auth::check())
            {!! Form::open(['action' => 'RdvController@storeCreation']) !!}
                {!! Form::text('raison', null, ['class' => 'form-control w-25', 'placeholder' => 'Entrez le motif de rendez-vous']) !!}
                <p> Ajout du patient </p>
                {!! Form::text('lastName', null, ['class' => 'form-control w-25', 'placeholder' => 'Entrez le nom de famille du patient']) !!}
                {!! Form::text('firstName', null, ['class' => 'form-control w-25', 'placeholder' => 'Entrez le prénom du patient']) !!} 
                {!! Form::submit('Envoyer !', ['class' => 'btn btn-success']) !!}
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