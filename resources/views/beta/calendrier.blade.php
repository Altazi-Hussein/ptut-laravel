<!doctype html>
<html lang="en">
<head>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>


    <style>
        /* ... */
    </style>
</head>
<body>
    <div id='calendar'></div>
    <script>
        $(document).ready(function() {
            $('#calendar').fullCalendar({
                // put your options and callbacks here
                defaultView: 'agendaWeek',
                events : [
                    @foreach($rdvs as $rdv)
                    {
                        title : '{{ $rdv->patient->nom . ' ' . $rdv->patient->prenom  }}',
                        start : '{{ $rdv->start_time }}',
                    },
                    @endforeach
                ],
            });
        });
    </script>
</body>
</html>

{{--
                        @isset ($rdv->finish_time)
                                end: '{{ $rdv->finish_time }}',
                        @endisset

--}}