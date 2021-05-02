@extends('admin.layouts.clean')

@section('content')
<main class="auth-page login-page">

  <div class="form-container">
    <img src="{{ asset('img/logo.svg') }}" alt="" class="logo">
    <p class="desc">Preencha com seu <b>email</b> cadastrado</p>

    @include('admin.includes.messages')

    <form action="{{ route('admin.auth.forgot-2') }}" method="get" class="form">
      <label class="label">
        Email:
        <input type="email" class="input" name="email">
      </label>

      <button type="submit" class="button colored">Continuar</button>
    </form>
  </div>

</main>
@stop