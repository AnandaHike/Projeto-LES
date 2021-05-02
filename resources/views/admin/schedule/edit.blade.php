@extends('admin.layouts.master')

@section('content')

<div class="create-page schedule">

  <h2 class="title">Editar Agendamento</h2>

  <form action="{{route('admin.dashboard.schedule.update', ['id' => $schedule->id])}}" method="POST" class="form">
    @csrf
    <div class="row">
      <div class="col">
        <label class="label center">
          Cliente:
          <select name="user_id" class="input" required>
            <option value="">Selecione</option>
            @foreach ($clients as $client)
            <option value="{{$client->id}}" {{$client->id == $schedule->user->id ? 'selected' : ''}}>{{$client->full_name}}</option>
            @endforeach
          </select>
        </label>

        <label class="label center">
          Serviço:
          <select name="service_id" class="input" required>
            <option value="">Selecione</option>
            @foreach ($services as $service)
            <option value="{{$service->id}}" {{$service->id == $schedule->service->id ? 'selected' : ''}}>{{$service->name}}</option>
            @endforeach
          </select>
        </label>
      </div>

      <div class="col">
        <label class="label center">
          Data:
          <input type="date" name="date" class="input" value="{{ $schedule->year . '-' . ($schedule->month < 10 ? '0' . $schedule->month : $schedule->month) .  '-' . ($schedule->day < 10 ? '0' . $schedule->day : $schedule->day) }}">
        </label>

        <label class="label center">
          Horário:
          <input type="time" name="hour" class="input" value="{{$schedule->hour < 10 ? '0' . $schedule->hour : $schedule->hour}}:{{$schedule->minute < 10 ? '0' . $schedule->minute : $schedule->minute}}">
        </label>
      </div>
    </div>

    <div class="row">
      <div class="col row">
        <a href="{{ route('admin.dashboard.schedule.index') }}" class="button-container">
          <button type="button" class="button">Voltar</button>
        </a>

        <button type="submit" class="button colored">Salvar</button>
      </div>
    </div>
  </form>

  <div class="delete-row">
    <form method="POST">
      @csrf
      @method('DELETE')
      <button onclick="return confirm('Deseja mesmo deletar sua conta?')" type="submit" class="button delete"><i class="icon fa fa-trash"></i>Deletar</button>
    </form>
  </div>

</div>

@stop