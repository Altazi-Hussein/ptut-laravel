@extends('layouts.app')
@section('titleContent', 'Configurer les rôles de la semaine')


@section('content')
<div class="card-body" style="">
@if(Auth::check())
@if ($errors->any())
<div class="error">
    <ul>
        @foreach ($errors->all() as $item)
            <li>{{ $item }}</li>
        @endforeach
    </ul>
</div>
@endif

@if(session('success'))
         <div class="alert alert-success" role="alert">
            {{session('success')}}
         </div>
@endif
<form action="{{route('semaine.store')}}" method="post">
        @csrf
        <label class="col-form-label text-md-right mb-2" for="dateSemaine">
                {{ __('Date de la semaine') }}
        </label>
        <input type="week" name="dateSemaine" id="dateSemaine" class="form-control mb-2">

        <label class="col-form-label text-md-right mb-2" for="ending_at">
                {{ 'Type de semaine' }}
        </label><br>

        <table class="table table-striped">
                <thead>
                <tr>
                        <th class="text-center" scope="col">Infirmière</th>
                        <th class="text-center" scope="col">Type de semaine</th>
                </tr>
                <tbody>
        @foreach ($users as $user)
        <tr>
                <td class="text-center" scope="row">{{$user->name}}</td>
                <td class="text-center">
                        <select name="typeSemaine[{{$user->id}}]" class="form-control">
                                <option value="">Choisissez un type</option>
                                <option value="petite">Petite semaine</option>
                                <option value="grosse">Grosse semaine</option>
                                <option value="permanence">Permanence</option>
                        </select>
                </td>
        </tr>
        @endforeach
        </tbody>
        </thead>
        </table>
        <input type="submit" class="btn btn-success mt-2 float-right">   
</form>

<a class="btn btn-primary mt-2" href="{{ route('semaine.index') }}">Voir toutes les semaines</a>
</div>
@endif
    <a class="btn btn-primary" href="{{ URL::previous() }}">Retour</a>
@endsection