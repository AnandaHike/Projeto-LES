@extends('admin.layouts.master')

@section('content')

<div class="create-page">

  <h2 class="title">Cadastrar Cliente</h2>

  @include('admin.includes.messages')

  <form action="{{route('admin.auth.create')}}" method="POST" class="form">
    @csrf
    <div class="row">
      <div class="col">
        <label class="label center">
          Nome completo:
          <input type="text" name="full_name" value='{{old('full_name')}}' class="input" required>
        </label>

        <label class="label center">
          Email:
          <input type="email" name="email" value='{{old('email')}}' class="input" required>
        </label>

        <label class="label center">
          CPF:
          <input type="text" name="cpf" value='{{old('cpf')}}' class="input" required>
        </label>
      </div>

      <div class="col">

        <label class="label center">
          Celular:
          <input type="text" name="cellphone" value='{{old('cellphone')}}' class="input">
        </label>

        <label class="label center">
          Senha:
          <input type="password" name="password" class="input">
        </label>

        <label class="label center">
          Confirmar senha:
          <input type="password" name="password_confirm" class="input">
        </label>
      </div>
    </div>

    <div class="row">
      <div class="col row">
        <a href="{{ route('admin.dashboard.clients.index') }}" class="button-container">
          <button type="button" class="button">Cancelar</button>
        </a>

        <button type="submit" class="button colored">Salvar</button>
      </div>
    </div>
  </form>

</div>

@stop