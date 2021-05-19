@extends('admin.layouts.master')
@section('content')
@include('admin.includes.messages')
<div style="display: flex; align-items: center;">
  <h1 class="title" style="margin: 2rem 2rem 2rem 0;">Dia {{$date}}</h1>
  <a href="{{ route('admin.dashboard.schedule.create', 'date='.$full_date) }}" class="button-container">
    <button type="button" class="button colored"><i class="icon fa fa-plus"></i>Adicionar evento</button>
  </a>
</div>

<div class="table-container">
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Cliente</th>
        <th>Serviço</th>
        <th>Preço</th>
      </tr>
    </thead>

    <tbody>
      @foreach($schedule as $event)
      <tr>
        <td>{{ $event->id }}</td>
        <td>{{ $event->user->full_name }}</td>
        <td>{{ $event->service->name }}</td>
        <td>{{ $event->service->price }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@stop