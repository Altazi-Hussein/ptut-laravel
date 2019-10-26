@extends('template')


@section('body')
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

                    <!-- choix de l'option : choisir un patient existant ou en créer un nouveau -->
                        {!! Form::radio('methodeChoixPatient', 'selection', true) !!}
                        {!! Form::radio('methodeChoixPatient', 'creation', false) !!}
                        
                        
                    <br>
                    
                    @if($methode == 'selection')
                    <!-- Sélection du patient parmis ceux existants --> 
                        
                        <h> Sélectionnez le patient </h> 
                        {!! Form::select('patient', $names)  !!}
                    @endif

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
