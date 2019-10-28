@extends('template')


@section('body')
            <div class="head">Ajouter rdv</div>
            <div class="body">
                @if(Auth::check())
                    <!-- choix de l'option : choisir un patient existant ou en créer un nouveau -->
                    <a href= {{url('rdv/createSelection')}}> Selectionner un patient existant </a>
                    <a href={{url('rdv/createCreation')}}> Créer un nouveau patient </a>
                
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
