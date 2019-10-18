@extends('layouts.app')
@section('head')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" 
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" 
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css" />
@endsection

@section('content')
    <div id='calendar'></div>
    <script>
        $(document).ready(function () {
            $('#calendar').fullCalendar({
                // put your options and callbacks here
                defaultView: 'agendaWeek',
                events: [
                    @foreach($rdvs as $rdv) {
                        title: '{{ $rdv->patient->firstName . ' ' . $rdv->patient->lastName  }}',
                        start: '{{ $rdv->start_time }}',
                    },
                    @endforeach
                ],
                eventClick: function (calEvent, jsEvent, view) {
                    $('#start_time').val(moment(calEvent.start).format('YYYY-MM-DD HH:mm:ss'));
                    $('#finish_time').val(moment(calEvent.end).format('YYYY-MM-DD HH:mm:ss'));
                    $('#editModal').modal();
                }
            });
        });
    </script>
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
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
