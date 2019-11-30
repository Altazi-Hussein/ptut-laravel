<table class='table table-striped'>
    <thead>
          <tr>
            <th class="text-center"scope="col">#</th>
            <th class="text-center"scope="col">Raison</th>
            <th class="text-center"scope="col">Patient</th>
            <th class="text-center"scope="col">Infirmière</th>
            <th class="text-center"scope="col">Date</th>
          </tr>
       <tbody>
           @foreach ($rdvs as $rdv)
           <tr>
                <th class="text-center" scope="row">{{$rdv->id}}</th>
                <td class="text-center">{{$rdv->reason}}</td>
                <td class="text-center">{{$rdv->patient->firstName}} {{$rdv->patient->lastName}}</td>
                @if (!empty($rdv->user))
                 <td class='text-center'>{{$rdv->user->name}}</td>
                @else{
                    <td class="text-center">Personne</td>
                @endif
            </tr>
           @endforeach
           </tbody>
        </thead>
     </table>