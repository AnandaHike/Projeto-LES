@extends('admin.layouts.clean')

@section('content')
<main class="auth-page login-page">

  <div class="form-container">

  <a href="../site/index.blade">
      <img src="{{ asset('img/logo.svg') }}" alt="" class="logo">
    </a>

    @include('admin.includes.messages')

    <form action="{{ route('admin.auth.login') }}" method="POST" class="form">
      @csrf

      <label class="label center">
        Email:
        <input type="email" class="input" name="email" required>
      </label>

      <label class="label center">
        Senha:
        <input type="password" class="input" name="password" required>
      </label>

      <button type="submit" class="button colored">Entrar</button>
      <a href="{{ route("admin.auth.forgot") }}" class="forgot">Esqueci minha senha</a>

      <a href="{{ route("admin.auth.create") }}" class="button-container">
        <button type="button" class="button">Criar uma conta</button>
      </a>
    </form>
  </div>

</main>
@stop