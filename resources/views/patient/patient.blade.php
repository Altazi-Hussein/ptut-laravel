@extends('template')

@section('contenu')
            <div class="head">Ajouter patient</div>
            <div class="body">
                {!! Form::open(['route' => 'patientAjoute']) !!}
                
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
                    {!! Form::text('nom', null, ['class' => 'form-control', 'placeholder' => 'Entre le nom du patient']) !!}
                    {!! Form::text('prenom', null,['class' => 'form-control', 'placeholder' => 'Entre le prenom du patient']) !!}
                </div>
                {!! Form::submit('Envoyer !' ) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
