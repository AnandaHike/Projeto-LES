@extends('admin.layouts.master')

@section('content')

<div class="index-page">
  <h1 class="title">Administradores</h1>

  @include('admin.includes.messages')

  <form action="#" class="search-form">
    <i class="icon fa fa-filter"></i>

    <label class="label">
      Nome:
      <input type="text" class="input" name="full_name">
    </label>

    <label class="label">
      Email:
      <input type="email" class="input" name="email">
    </label>

    <label class="label">
      CPF:
      <input type="name" class="input" name="cpf">
    </label>

    <button type="submit" class="button colored">Buscar</button>

    <a href="{{ route('admin.dashboard.users.create') }}" class="button-container">
      <button type="button" class="button colored"><i class="icon fa fa-plus"></i>Cadastrar</button>
    </a>
  </form>

  <div class="table-container">
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nome</th>
          <th>Email</th>
          <th>CPF</th>
          <th>Celular</th>
          <th></th>
          <th></th>
        </tr>
      </thead>

      <tbody>
        @foreach($users as $user)
        <tr>
          <td>{{ $user->id }}</td>
          <td>{{ $user->full_name }}</td>
          <td>{{ $user->email }}</td>
          <td>{{ $user->cpf }}</td>
          <td>{{ $user->cellphone }}</td>
          <td>
            <a href="{{route('admin.dashboard.users.edit', ['id' => $user->id])}}">
              <button class="action edit"><i class="icon fa fa-pen"></i></button>
            </a>
          </td>
          <td>
            <form action="{{route('admin.dashboard.users.destroy', ['id' => $user->id])}}" method="POST">
              @csrf
              @method('DELETE')
              <button onclick="return confirm('Deseja mesmo deletar sua conta?')" type="submit" class="action delete"><i class="icon fa fa-trash"></i></button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>


<script>
  const urlParams = new URLSearchParams(window.location.search);
  document.querySelector('input[name="full_name"]').value = urlParams.get('full_name');
  document.querySelector('input[name="email"]').value = urlParams.get('email');
  document.querySelector('input[name="cpf"]').value = urlParams.get('cpf');
</script>

@stop