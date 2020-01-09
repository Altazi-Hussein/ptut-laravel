@extends('layouts.app')
@section('head')
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>        
    <link href='https://unpkg.com/@fullcalendar/core@4.3.1/main.min.css' rel='stylesheet' />
    <link href='https://unpkg.com/@fullcalendar/daygrid@4.3.0/main.min.css' rel='stylesheet' />
    <link href='https://unpkg.com/@fullcalendar/timegrid@4.3.0/main.min.css' rel='stylesheet' />

    <script src='https://unpkg.com/@fullcalendar/core@4.3.1/main.min.js'></script>
    <script src='https://unpkg.com/@fullcalendar/daygrid@4.3.0/main.min.js'></script>
    <script src='https://unpkg.com/@fullcalendar/interaction@4.3.0/main.min.js'></script>
    <script src='https://unpkg.com/@fullcalendar/timegrid@4.3.0/main.min.js'></script>
@endsection

@section('titleContent', 'Calendrier')

@section('content')
@if(Auth::check())
<div class="card-body" style="">
{{--         <div id="game">
                <button onClick="choose('oui')">Modifier</button>
                <button onClick="choose('non')">Fin modification</button>
                <button onClick="test()">DEBUG</button>
            </div>
            <script>
            var change;
            var modifiable;
            function choose(choice){
                if(choice == 'oui')
                {
                    window.location.reload();
                    modifiable = true;
                }
                if (choice == 'non')
                {
                    window.location.reload();
                    modifiable = false;
                }
            }
            
            function test(click){
                alert("Modifiable est maintenant " + modifiable);
            }
            
            </script> --}}
        <a href=" {{ route('home') }}" class="btn btn-primary">Retour</a>
        <form action="{{route('CalendrierController@index')}}" method="get">
            @csrf
            <select name="id" id="id">
                @foreach ($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>
            <input type="submit" value="">
        </form>
    <div id='calendar'></div>
    <script>
        var modifiable = true;
         document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
            plugins: [ 'interaction', 'timeGrid' ],
            timeZone: 'UTC',
            minTime: "8:00",
            maxTime: "18:00",
            defaultView: 'timeGridFourDay',
            header: {
                left: 'dayGridDay,dayGridWeek',
                center: 'title',
                right: 'prev,next',
            },
            views: {
                timeGridFourDay: {
                type: 'timeGrid',
                duration: { days: 7 },
                buttonText: '7 day'
                }
            },
            editable: modifiable,
            events: [
                    @foreach($rdvs as $rdv) {
                        id: '{{ $rdv->id }}',
                        title: '{{ $rdv->patient->firstName . ' ' . $rdv->patient->lastName  }}',
                        start: '{{ $rdv->start_time }}',
                        @isset($rdv->finish_time)
                            end: '{{ $rdv->finish_time }}',
                        @endisset
                    },
                    @endforeach
                ],
                eventClick: function (info) {
                    $('#event_id').val(info.event.id);
                    $('#titleModal').text(info.event.title);
                    $('#start_time').val(moment(info.event.start).format('YYYY-MM-DD HH:mm:ss'));
                    $('#editModal').modal('show');
                }
            });
            /*
            $('#appointment_update').click(function(e) {
                e.preventDefault();
                var data = {
                    _token: '{{ csrf_token() }}',
                    rdv_id: $('#rdv_id').val(),
                    start_time: $('#start_time').val(),
                    finish_time: $('#finish_time').val(),
                };

                $.post('{{ route('calendrier.ajax_update') }}', data, function( result ) {
                    $('#calendar').fullCalendar('removeEvents', $('#event_id').val());

                    $('#calendar').fullCalendar('renderEvent', {
                        title: result.rdv.client.firstName + ' ' + result.rdv.client.lastName,
                        start: result.rdv.start_time,
                        end: result.rdv.finish_time
                    }, true);

                    $('#editModal').modal('hide');
                });
                
            });*/
            calendar.render();
        });
    </script>
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <input type="hidden" name="event_id" id="event_id" value="" />
                    <input type="hidden" name="rdv_id" id="rdv_id" value="" />
                    <div class="modal-body">
                        <h4>Modifier rendez-vous</h4><h3 id="titleModal"></h3>
    
                        Date début:
                        <br />
                        <input type="text" class="form-control" name="start_time" id="start_time">
    
                        Date fin:
                        <br />
                        <input type="text" class="form-control" name="finish_time" id="finish_time">
                    </div>
    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                        <input type="button" class="btn btn-primary" id="appointment_update" value="Valider">
                    </div>
                </div>
            </div>
    </div>
</div>
@endif
@endsection