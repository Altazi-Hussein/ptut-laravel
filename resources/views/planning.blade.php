@extends('layouts.app')

@section('titleContent', 'Rendez-vous à faire')

@section('content')
<div class="card-body d-flex justify-content-between" style="">
    <div class="d-flex flex-column">
        <h4>{{$infP->name}}</h4>
        <h5>Petite Semaine</h5>
    <table class="table table-striped mr-2">
        <thead>
                @php
                    $sommeDistanceP = 0;
                    $sommeDistanceG = 0;
                @endphp
                {{-- <th class="text-center"scope="col">debug</th> --}}
                <th class="text-center"scope="col">Ordre de priorité</th>
                <th class="text-center"scope="col">Patient</th>
                <th class="text-center"scope="col">Rendez-vous</th>
                <th class="text-center"scope="col">Distance</th>
                <th class="text-center"scope="col">Terminé?</th>
                {{-- <th class="text-center"scope="col">Action</th> --}}
           <tbody>
               @foreach ($rdvsP as $rdvP)
                   <tr>
                  {{--  <td>{{$rdvP}}</td> --}}
                   <td>{{$rdvP->ordre}} {{$rdvP->id}}</td>
                   <td>{{$rdvP->patient->firstName}} {{$rdvP->patient->lastName}}</td>
                   <td>{{$rdvP->type->nom}}</td>
                   <td>{{$rdvP->ville["distance"]}}km</td>
                   @php
                       $sommeDistanceP+= $rdvP->ville["distance"];
                   @endphp
                    @if ($rdvP->fait == 0)
                    <td class="text-success">
                        <form action="{{route('generation.valider')}}" method="get">
                        <input type="hidden" value="{{$rdvP->id}}" name="id">
                        <button class="btn btn-success" type="submit">
                            <i class="fas fa-check"></i>
                        </button>
                        </form>
                    </td>
                    @else
                    <td class="text-success">Terminé</td>
                   @endif
                   </tr>
               @endforeach
               <tr class="border">
               <td>Total des distances: </td>
                   <td></td>
                   <td></td>
                   <td>{{$sommeDistanceP}}km</td>
                   <td></td>
               </tr>
           </tbody>
        </thead>
    </table>
    </div>
        <div class="d-flex flex-column">
            <h4 class="ml-2">{{$infG->name}}</h4>
            <h5 class="ml-2">Grosse Semaine</h5>
    <table class="table table-striped ml-2">
        <thead>
              <tr>
                {{-- <th class="text-center"scope="col">debug</th> --}}
                <th class="text-center"scope="col">Ordre de priorité</th>
                <th class="text-center"scope="col">Patient</th>
                <th class="text-center"scope="col">Rendez-vous</th>
                <th class="text-center"scope="col">Distance</th>
                <th class="text-center"scope="col">Terminé?</th>
                {{-- <th class="text-center"scope="col">Action</th> --}}
              </tr>
           <tbody>
               @foreach ($rdvsG as $rdvG)
                   <tr>
                  {{--  <td>{{$rdvP}}</td> --}}
                   <td>{{$rdvG->ordre}} {{$rdvP->id}}</td>
                   <td>{{$rdvG->patient->firstName}} {{$rdvG->patient->lastName}}</td>
                   <td>{{$rdvG->type->nom}}</td>
                   <td>{{$rdvG->ville["distance"]}}km</td>
                   @php
                       $sommeDistanceG+= $rdvG->ville["distance"];
                   @endphp
                    @if ($rdvG->fait == 0)
                    <td class="text-success">
                        <form action="{{route('generation.valider')}}" method="get">
                        <input type="hidden" value="{{$rdvP->id}}" name="id">
                        <button class="btn btn-success" type="submit">
                            <i class="fas fa-check"></i>
                        </button>
                        </form>
                    </td>
                    @else
                    <td class="text-success">Terminé</td>
                   @endif
                   </tr>
               @endforeach
               <tr class="border">
               <td>Total des distances: </td>
                   <td></td>
                   <td></td>
                   <td>{{$sommeDistanceG}}km</td>
                   <td></td>
               </tr>
           </tbody>
        </thead>
    </table>
        </div>
</div>
{{-- @foreach ($rdvsP as $rdvP)
{{$rdvP->id /*Afficher le nom des patient*/ }}
{{$rdvP->patient->firstName}} {{$rdvP->patient->lastName}}

{{$rdvP->user->name}}
    <br>
@endforeach
<br>
@foreach ($rdvsG as $rdvG)
    {{$rdvG->id}}
    {{$rdvG->user->name}}
    <br>

@endforeach --}}
</div>
@endsection