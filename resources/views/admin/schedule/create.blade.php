@extends('admin.layouts.master')

@section('content')

<div class="create-page schedule">

  <h2 class="title">Cadastrar Agendamento</h2>

  @include('admin.includes.messages')

  <form action="{{route('admin.dashboard.schedule.store')}}" method="POST" class="form">
    @csrf
    <div class="row">
      <div class="col">
        @if(Auth::user()->function == 'client')
        <label class="label center" style="display: none">
          Cliente:
          <select name="user_id" class="input" required>
            <option selected value="{{Auth::id()}}">Selecione</option>
            @foreach ($clients as $client)
            <option value="{{$client->id}}">{{$client->full_name}}</option>
            @endforeach
          </select>
        </label>
        @else
        <label class="label center">
          Cliente:
          <select name="user_id" class="input" required>
            <option value="">Selecione</option>
            @foreach ($clients as $client)
            <option value="{{$client->id}}">{{$client->full_name}}</option>
            @endforeach
          </select>
        </label>
        @endif

        <label class="label center">
          Serviço:
          <select name="service_id" class="input" required>
            <option value="">Selecione</option>
            @foreach ($services as $service)
            <option value="{{$service->id}}">{{$service->name}}</option>
            @endforeach
          </select>
        </label>
      </div>

      <div class="col">
        <label class="label center">
          Data:
          <input type="date" name="date" class="input" value="{{ Request::get('date') }}">
        </label>

        <label class="label center">
          Horário:
          <input type="time" name="hour" class="input" value="">
        </label>
      </div>
    </div>

    <div class="row">
      <div class="col row">
        <a href="{{ route('admin.dashboard.schedule.index') }}" class="button-container">
          <button type="button" class="button">Cancelar</button>
        </a>

        <button type="submit" class="button colored">Salvar</button>
      </div>
    </div>
  </form>

</div>

@stop