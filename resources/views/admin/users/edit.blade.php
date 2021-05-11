@extends('admin.layouts.master')

@section('content')

<div class="create-page">

  <h2 class="title">Editar Usuário</h2>

  @include('admin.includes.messages')

  <form method="POST" class="form">
    @csrf
    @method('PUT')
    <input type="hidden" name="id" value="{{$user->id}}">
    <div class="row">
      <div class="col">
        <label class="label center">
          Nome completo:
          <input type="text" name="full_name" value='{{ $user->full_name }}' class="input" required>
        </label>

        <label class="label center">
          Email:
          <input type="email" name="email" value='{{ $user->email }}' class="input" required>
        </label>

        <label class="label center">
          CPF:
          <input type="text" name="cpf" value='{{ $user->cpf }}' class="input" required>
        </label>

        <label class="label center">
          Celular:
          <input type="text" name="cellphone" value='{{ $user->cellphone }}' class="input">
        </label>
      </div>

      <div class="col">

        <label class="label center">
          Pergunta Secreta:
          <select name="secret_question" class="input" required>
            <option value="">Selecione</option>
            <option {{ $user->secret_question == 'Qual o nome de solteira da sua mãe?' ? 'selected' : '' }} value="Qual o nome de solteira da sua mãe?">Qual o nome de solteira da sua mãe?</option>
            <option {{ $user->secret_question == 'Qual o nome do seu primeiro animal de estimação?' ? 'selected' : '' }} value="Qual o nome do seu primeiro animal de estimação?">Qual o nome do seu primeiro animal de estimação?</option>
            <option {{ $user->secret_question == 'Qual o modelo do seu primeiro carro?' ? 'selected' : '' }} value="Qual o modelo do seu primeiro carro?">Qual o modelo do seu primeiro carro?</option>
            <option {{ $user->secret_question == 'Em que cidade você nasceu?' ? 'selected' : '' }} value="Em que cidade você nasceu?">Em que cidade você nasceu?</option>
            <option {{ $user->secret_question == 'Qual o seu apelido?' ? 'selected' : '' }} value="Qual o seu apelido?">Qual o seu apelido?</option>
          </select>
        </label>

        <label class="label center">
          Resposta:
          <input type="text" name="secret_answer" value='{{ $user->secret_answer }}' class="input" required>
        </label>

        <label class="label center">
          <div class="empty">Não preencha caso queira manter a mesma senha.</div>
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
        <a href="{{ route('admin.dashboard.users.index') }}" class="button-container">
          <button type="button" class="button">Cancelar</button>
        </a>

        <button type="submit" class="button colored">Salvar</button>
      </div>
    </div>
  </form>

</div>

@stop