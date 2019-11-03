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
            {{-- @if ($errors->any())
            <div class="error">
                <ul>
                    @foreach ($errors->all() as $item)
                        <p class="bg-danger text-light">{{ $item }}</p>
                    @endforeach
                </ul>
            </div>
            @endif --}}
            {!! Form::open(['action' => 'RdvController@storeSelection']) !!}

            <label class="col-form-label text-md-right mb-2" for="patient">
                    {{ __('Sélection du patient') }}
                </label>
                {{-- {!! Form::select('patient', $names, ['class' => 'form-control mb-2', 'id'=>'patient'])  !!} --}}
                <select name="patient" class="form-control mb-2">
                    @foreach($patients as $patient)
                    <option value="{{ $patient->id }}">{{$patient->firstName}} {{ $patient->lastName}}</option>
                    @endforeach
                  </select>


            <label class="col-form-label text-md-right mb-2" for="raison">
                {{ __('Motif du rendez-vous') }}
            </label>
            {!! Form::text('raison', null, ['class' => 'form-control mb-2', 'placeholder' => 'Motif du rendez-vous', 'id' => 'raison']) !!}

            <label class="col-form-label text-md-right mb-2" for="date">
                    {{ __('Date du rendez-vous') }}
            </label>
            {!! Form::date('started_at', null, ['class' => 'form-control mb-2', 'id' => 'date']) !!}

            {!! Form::submit('Ajouter', ['class' => 'btn btn-success mt-2 float-right']) !!}
            {!! Form::close() !!}
        @endif
</div>
<a class="btn btn-primary float-left" href="{{ route('rdv.create') }}">Retour</a>
@endsection