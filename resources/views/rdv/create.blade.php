{{--@extends('template')--}}
@extends('layouts.app')
@section('head')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
<link href="https://raw.githack.com/ttskch/select2-bootstrap4-theme/master/dist/select2-bootstrap4.css" rel="stylesheet">
<script>
    $(document).ready(function(){
        $('input[type="radio"]').click(function(){
         var demovalue = $(this).val(); 
            $("div.creationRDV").hide();
            $("#"+demovalue).show();
            $("#styleDeRDV").val(demovalue);
        });
        $('.inputSearchable').select2({
            ajax: {
                url: '{{ route("recherchePatient") }}',
                dataType: 'json',
                processResults: function (q) {
                    return {
                        results: q.data
                    };
                    }
            }
            });
    });
    </script>
@endsection
@section('titleContent', 'Ajouter un rendez-vous')

@section('content')
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<div class="card-body" style="">
        @if(Auth::check())
            {!! Form::open(['action' => 'RdvController@store']) !!}
                <label class="col-form-label text-md-right mb-2" for="raison">
                    {{ __('Motif du rendez-vous') }}
                </label>
                <select name="type" id="type" class="form-control mb-2">
                    @foreach ($types as $type)
                <option value="{{ $type->id }}">{{ $type->nom}}</option>
                    @endforeach
                </select>
                <div class='btn-group btn-group-toggle' data-toggle='buttons'>
                    <label class='btn btn-secondary '>
                        <input type="radio" name="demo" value="creationPatient" checked/> Créer un patient
                    </label>
                    <label class='btn btn-secondary'>
                        <input type="radio" name="demo" value="selectionPatient"/> Sélectionner un patient
                    </label>    
                </div>
                <input type="hidden" id="styleDeRDV" name="styleDeRDV" value="creationPatient">
                <div id="creationPatient" class="creationRDV">
                    <label class="col-form-label text-md-right mb-2" for="patient">
                        {{ __('Ajout du patient') }}
                    </label>
                    {!! Form::text('lastName', null, ['class' => 'form-control mb-2', 'placeholder' => 'Nom de famille du patient', 'id' => 'patient']) !!}
                    {!! Form::text('firstName', null, ['class' => 'form-control mb-2', 'placeholder' => 'Prénom du patient']) !!} 
                </div>
                <div id="selectionPatient" class="creationRDV" style="display:none;">
                    <label> Sélectionner un patient
                        <select name="patient" class="form-control mb-2 inputSearchable">
                        </select>
                    </label>
                </div>
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
 <a class="btn bg-primary p-2 mt-2 text-light" href="{{ route('home') }}">Accueil</a>

@endsection
