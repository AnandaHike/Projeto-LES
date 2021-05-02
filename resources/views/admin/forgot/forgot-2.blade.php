@extends('admin.layouts.clean')

@section('content')
<main class="auth-page login-page">

  <div class="form-container">
    <img src="{{ asset('img/logo.svg') }}" alt="" class="logo">
    <p class="desc">Responda a pergunta secreta para recuperar a senha</p>

    @include('admin.includes.messages')

    <form action="{{ route("admin.auth.forgot-3") }}" class="form">
      <input type="hidden" name="email" value="{{$user->email}}">
      <label class="label">
        {{$user->secret_question}}
        <input type="text" class="input" name="secret_answer">
      </label>

      <button type="submit" class="button colored">Continuar</button>
    </form>
  </div>

</main>
@stop