@extends('admin.layouts.clean')

@section('content')
<main class="auth-page login-page">

  <div class="form-container">
    <img src="{{ asset('img/logo.svg') }}" alt="" class="logo">
    <p class="desc">Preencha com a nova senha</p>

    @include('admin.includes.messages')

    <form action="{{ route("admin.auth.reset-password") }}" method="POST" class="form">
      @csrf
      <input type="hidden" name="email" value="{{$user->email}}">

      <label class="label">
        Nova senha:
        <input type="password" name="password" class="input">
      </label>

      <label class="label">
        Confirmar nova senha:
        <input type="password" name="password_confirm" class="input">
      </label>

      <button class="button colored">Salvar</button>

      <a href="{{ route('admin.auth.login') }}" class="button-container">
        <button type="button" class="button">Cancelar</button>
      </a>
    </form>
  </div>

</main>
@stop