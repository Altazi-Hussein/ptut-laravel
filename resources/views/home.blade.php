@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Espace infirmier(ère)</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="home" method="POST">
                        <input class="btn btn-success p-3 " type="submit" value="Ajouter" name="patient">
                    </form>
                    <a href="./rdv/create"><input class="btn btn-success p-3 mt-2" type="button" value="Ajouter un rendez-vous"></a>
                    <a href="./calendrier"><input class="btn btn-success p-3 mt-2 d-block" type="button" value="Accéder au calendrier"></a>
                    
                    @php
                        if (isset($_POST['patient']))
                            echo 'oui';



                    @endphp
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
