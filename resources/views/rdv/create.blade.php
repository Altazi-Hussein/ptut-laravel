@extends('template')

@section('contenu')
            <div class="head">Ajouter rdv</div>
            <div class="body">
                @if(Auth::check())
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
                    {!! Form::text('raison', null, ['class' => 'form-control w-25', 'placeholder' => 'Entrez le motif de rendez-vous']) !!}
                    {!! Form::text('patient', null,['class' => 'form-control w-25', 'placeholder' => 'Entrez le nom du patient']) !!}
                </div>
                {!! Form::submit('Envoyer !', ['class' => 'btn btn-success']) !!}
                {!! Form::close() !!}
                @else
                    {{'Vous n\'êtes pas connecté !'}}
                @endif
                
                <div class="footer">
                    <a href="{{ route('home') }}"><input class="btn bg-primary p-2 mt-2 text-light" type="button" value="Retour">
                </div>
            </div>
        </div>
    </div>
@endsection
