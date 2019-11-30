@extends('layouts.app')

@section('head')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

{{-- @section('titleContent', 'Recherche par rendez-vous'); --}}

@section('content')
<form action="{{ url('searchPost') }}" method="post">
    <input class="form-control "type="text" name="dunno" id="dunno" placeholder="Dunno">
    <button type="submit">Entrer</button>
</form>
<div id="ratlebol">

</div>
<script>
    $(document).ready(function(){
    
        $(document).on('keyup', '#dunno', function(e){
        {
            var query = $(this).val();
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });
            $.ajax({
                url:"{{ route('search.action') }}",
                method:'POST',
                data:{query:query},
                dataType:'html',
                success:function(data)
                {
                    $("#ratlebol").html(data);
                }
            })
        }})
    });
</script>
    
{{--
@isset($rdvs)
    @foreach ($rdvs as $rdv)
        @if (!empty($rdv->user))
        infirmier : {{ $rdv->user->name }} <br>
        @else
        infirmier : personne <br>
        @endif
        patient : {{ $rdv->patient->lastName }}<br>
        raison :{{ $rdv->reason }}<br>
    @endforeach
    <br><br>
    {{$rdvs->links()}}
        
@endisset
--}}
@endsection