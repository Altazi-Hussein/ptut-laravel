@foreach ($rdvsP as $rdvP)
    {{$rdvP->id //Afficher le nom des patient }}
    <br>
@endforeach
<br>
@foreach ($rdvsG as $rdvG)
    {{$rdvG->id}}
    <br>
@endforeach