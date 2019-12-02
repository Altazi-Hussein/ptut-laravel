@extends('layouts.app')

@section('titleContent', 'Modifier un rendez-vous')

@section('content')
<div class="card-body" style="">
        @if(Auth::check())
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        {!! Form::model($rdv, ['route' => ['rdv.update', $rdv->id]]) !!}
        @method('PATCH')
                <label class="col-form-label text-md-right mb-2" for="raison">
                    {{ __('Motif du rendez-vous') }}
                </label>
                {{-- On affiche tous les types de rendez-vous existants --}}
                <select name="type_id" id="type_id" class="form-control mb-2">
                {{-- <option selected="selected" value="{{$rdv['type_id']}}">
                    Par défaut
                </option> --}}
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}">{{$type->nom}}</option>
                    @endforeach
                </select>

                <label class="col-form-label text-md-right mb-2" for="raison">
                        {{ 'Patient' }}
                    </label>
                <select name="patient_id" id="patient" class="form-control mb-2">
                    {{-- <option selected="selected">
                        {{$rdv->patient_id}}
                    </option> --}}
                    @foreach($patients as $patient)
                        <option value="{{$patient->id}}">{{$patient->firstName . " " . $patient->lastName}}</option>
                    @endforeach
                </select>

                <label class="col-form-label text-md-right mb-2" for="raison">
                        {{ 'Patient' }}
                </label>
                <select name="user_id" id="user" class="form-control mb-2">
                    {{-- <option selected="selected">
                        {{$rdv->patient_id}}
                    </option> --}}
                    @foreach($users as $user)
                        <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                </select>

                <label class="col-form-label text-md-right mb-2" for="raison">
                        {{ 'Heure du rendez-vous' }}
                </label>
                <input class="form-control mb-2" type="datetime-local" name="start_time">

                <div class="d-flex justify-content-center">
                    <input type="submit" value="Modifier le rendez-vous" class="btn btn-success mt-3">
                </div>
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
 <a class="btn bg-primary p-2 mt-2 text-light" href="{{ route('home') }}">Accueil</a>

@endsection
