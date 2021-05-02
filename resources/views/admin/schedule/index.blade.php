@extends('admin.layouts.master')

@section("css")
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.6.0/main.min.css">
@stop

@section('content')

@include('admin.includes.messages')

<section class="index-page schedule">

  <a href="{{ route("admin.dashboard.schedule.create") }}" class="button-container">
    <button class="button colored"><i class="icon fa fa-plus"></i>Novo agendamento</button>
  </a>

  <div class="calendar-container">
    <div id="calendar"></div>
  </div>

</section>

@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.6.0/main.min.js"></script>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
      aspectRatio: 2,
      initialView: 'dayGridMonth',
      locale: 'pt-br',
      editable: true,
      displayEventTime: this.displayEventTime,
      slotLabelFormat: 'HH:mm',
      allDayText: '24 horas',
      eventTimeFormat: {
        hour: 'numeric',
        minute: '2-digit',
      },
      buttonText: {
        today: 'Hoje',
        month: 'Mês',
        week: 'Semana',
        day: 'Hoje',
        list: 'Lista'
      },
      disableDragging: true,
      droppable: false,
      dateClick: function(info) {
        //  ON CLICK DATE
        if (!info.dayEl.classList.contains("fc-day-past"))
          window.location.href = "{{ route('admin.dashboard.schedule.create', 'date=') }}" + info.dateStr;
      },
    });

    @foreach($schedule as $event)

    calendar.addEvent({
      id: {{$event -> id}},
      title: '{{$event->service->name}} - {{$event->user->full_name}}',
      start: new Date("{{$event->year}}-{{$event->month}}-{{$event->day}} {{$event->hour}}:{{$event->minute}}"),
      url: "{{ route('admin.dashboard.schedule.edit', $event->id) }}",
    })

    @endforeach

    calendar.render();
  });
</script>
@stop