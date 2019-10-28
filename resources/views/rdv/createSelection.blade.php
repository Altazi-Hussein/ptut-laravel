@extends('layouts.app')


@section('content')
    <div class="head">Ajouter rdv</div>
    <div class="body">
        @if(Auth::check())
            {!! Form::open(['action' => 'RdvController@storeSelection']) !!}
            {!! Form::text('raison', null, ['class' => 'form-control w-25', 'placeholder' => 'Entrez le motif de rendez-vous']) !!}
                <p> Sélectionnez le patient </p> 
                {!! Form::select('patient', $names)  !!}
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