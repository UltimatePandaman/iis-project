<div {{ $attributes->merge(['class' => 'bg-gray']) }}>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js'></script>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/core/main.min.css' />
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/daygrid/main.min.css' />

    <div id='calendar'></div>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/core/main.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/core/locales-all.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/moment/main.min.js'></script>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/daygrid/main.min.js'></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/timegrid/main.min.js" integrity="sha512-APuj9Rm7J37dj8cRB1qwznH+zrWD7/vkaodDwJVxpdk72m5c9u8mbbdLHn6JnSw5M4AhV8Zb1HnLrNMGoOfR/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/timegrid/main.min.css" integrity="sha512-/Jnt6fX98n8zZyuCt4K81+1eQJhWQn/vyMph1UvHywyziYDbu9DFGcJoW8U73m/rkaQBIEAJeoEj+2Rrx4tFyw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/list/main.min.css" integrity="sha512-tNMyUN1gVBvqtboKfcOFOiiDrDR2yNVwRDOD/O+N37mIvlJY5d5bZ0JeUydjqD8evWgE2cF48Gm4KvQzglN0fg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/list/main.min.js" integrity="sha512-Iw4G4+WD3E3F0M+wVZ95nlnifX1xk2JToaD4+AB537HmOImFi79BTtWma57mJeEnK2qNTOgZrYLtAHVsNazzqg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/interaction/main.min.js" integrity="sha512-9M3YQ9E3hEtjRZSQdU1QADaOGxI+JAzq6bieArw7nIxQbPmn10M7TYxhvJZCuvSjlncJG24l+/e5d1bTRN3m4g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                plugins: ['dayGrid', 'timeGrid', 'list' ],
                height: 'parent',
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: ''
                },
                defaultView: 'dayGridWeek',
                navLinks: true, // can click day/week names to navigate views
                editable: false,
                eventLimit: false, // allow "more" link when too many events
                events: [
                    @foreach ($obj->presentations->unique() as $event)
                        {
                        title: '{{ $event->title }}',
                        start: '{{ $event->date.__('T').$event->start }}',
                        end: '{{ $event->date.__('T').$event->end }}',
                        //URL TODO
                        //url: '{{ __('conference/').$event->id }}',
                        color: '#3E5F8A'
                        },
                    @endforeach
                ]
            });

            calendar.render();
        });
    </script>
</div>