@extends('template')

@section('contenu')
            <div class="head">Ajouter rdv</div>
            <div class="body">
                {!! Form::open(['action' => 'RdvController@store']) !!}
                
                @if ($errors->any())
                    <div class="error">
                        <ul>
                            @foreach ($errors->all() as $item)
                        <li>{{ $item }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="form-group">
                    {!! Form::text('raison', null, ['class' => 'form-control', 'placeholder' => 'Entré le motif de rendez-vous']) !!}
                    {!! Form::text('patient', null,['class' => 'form-control', 'placeholder' => 'Entré le nom du patient']) !!}
                </div>
                {!! Form::submit('Envoyer !' ) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
