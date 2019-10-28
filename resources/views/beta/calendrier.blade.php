@extends('layouts.app')
@section('head')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" 
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
        
    <link href='https://unpkg.com/@fullcalendar/core@4.3.1/main.min.css' rel='stylesheet' />
    <link href='https://unpkg.com/@fullcalendar/daygrid@4.3.0/main.min.css' rel='stylesheet' />

    <script src='https://unpkg.com/@fullcalendar/core@4.3.1/main.min.js'></script>
    <script src='https://unpkg.com/@fullcalendar/daygrid@4.3.0/main.min.js'></script>
    <script src='https://unpkg.com/@fullcalendar/interaction@4.3.0/main.min.js'></script>

    @endsection

@section('content')
    <div id='calendar'></div>
    <script>
         document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
            plugins: [ 'interaction', 'dayGrid' ],
            timeZone: 'UTC',
            defaultView: 'dayGridWeek',
            header: {
                left: 'prev,next',
                center: 'title',
                right: 'dayGridDay,dayGridWeek'
            },
            editable: true,
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
                eventClick: function (calEvent, jsEvent, view) {
                    $('#event_id').val(calEvent._id);
                    $('#rdv_id').val(calEvent.id);
                    $('#start_time').val(moment(calEvent.start).format('YYYY-MM-DD HH:mm:ss'));
                    $('#finish_time').val(moment(calEvent.end).format('YYYY-MM-DD HH:mm:ss'));
                    $('#editModal').modal();
                }
            });
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
            });
            calendar.render();
        });
    </script>
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <input type="hidden" name="event_id" id="event_id" value="" />
                    <input type="hidden" name="rdv_id" id="rdv_id" value="" />
                    <div class="modal-body">
                        <h4>Edit Appointment</h4>
    
                        Start time:
                        <br />
                        <input type="text" class="form-control" name="start_time" id="start_time">
    
                        End time:
                        <br />
                        <input type="text" class="form-control" name="finish_time" id="finish_time">
                    </div>
    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <input type="button" class="btn btn-primary" id="appointment_update" value="Save">
                    </div>
                </div>
            </div>
    </div>
@endsection

{{--
                        @isset ($rdv->finish_time)
                                end: '{{ $rdv->finish_time }}',
@endisset

--}}
