@extends('layouts.app')

@section('titleContent', 'Ajouter un rendez-vous')

@section('content')
<div class="card-body" style="">
        @if(Auth::check())
            {!! Form::open(['action' => 'RdvController@storeSelection']) !!}
            {!! Form::text('raison', null, ['class' => 'form-control', 'placeholder' => 'Motif du rendez-vous']) !!}
                {{--<p> Sélectionnez le patient </p> --}}
                <br>
                {!! Form::select('patient', $names)  !!}
                <br><br>
                <a class="btn btn-primary float-left" href="{{ route('home') }}">Accueil</a>
                {!! Form::submit('Envoyer !', ['class' => 'btn btn-success float-right']) !!}
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