@extends('layouts.app')

@section('titleContent', 'Espace infirmier(ère)')

@section('content')
<div class="card-body" style="">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
        <form action="home" method="POST" class="d-flex flex-column">
            <a class="btn btn-success p-3 mt-2" href="{{url('rdv/create')}}">Ajouter un rendez-vous</a>
            <a class="btn btn-success p-3 mt-2" href="{{url('rdv')}}">Voir liste des rendez-vous</a>
            <a class="btn btn-success p-3 mt-2" href="{{url('calendrier')}}">Accéder au calendrier</a>
<<<<<<< HEAD
            <a class="btn btn-success p-3 mt-2" href="{{url('generation')}}">Génerer le planning</a>
        </form>
=======
            <a class="btn btn-primary p-3 mt-2" href="{{url('type')}}">Gérer les types</a>
            <a class="btn btn-warning p-3 mt-2" href="{{url('semaine/')}}">Gérer la semaine</a>
            </form>
>>>>>>> cc3b382cc2712e3b727ef0473b636203131222f7
</div>
@endsection
