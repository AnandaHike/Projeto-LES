@extends('admin.layouts.master')

@section('content')

<div class="index-page">
  <h1 class="title">Serviços</h1>

  @include('admin.includes.messages')

  <form action="#" class="search-form">
    <i class="icon fa fa-filter"></i>

    <label class="label">
      Nome:
      <input type="text" class="input" name="name">
    </label>

    <label class="label">
      Categoria:
      <input type="text" class="input" name="category">
    </label>
    <button type="submit" class="button colored">Buscar</button>

    @if(Auth::user()->function != 'client')
      

      <a href="{{ route('admin.dashboard.services.create') }}" class="button-container">
        <button type="button" class="button colored"><i class="icon fa fa-plus"></i>Cadastrar</button>
      </a>
    @endif
  </form>

  <div class="table-container">
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nome</th>
          <th>Categoria</th>
          <th>Preço</th>
          @if(Auth::user()->function != 'client')
            <th></th>
            <th></th>
          @endif
        </tr>
      </thead>

      <tbody>
        @foreach($services as $service)
        <tr>
          <td>{{ $service->id }}</td>
          <td>{{ $service->name }}</td>
          <td>{{ $service->category }}</td>
          <td>{{ $service->price }}</td>
          @if(Auth::user()->function != 'client')
            <td>
              <a href="{{route('admin.dashboard.services.edit', ['id' => $service->id])}}">
                <button class="action edit"><i class="icon fa fa-pen"></i></button>
              </a>
            </td>
            <td>
              <form action="{{route('admin.dashboard.services.destroy', ['id' => $service->id])}}" method="POST">
                @csrf
                @method('DELETE')
                <button onclick="return confirm('Deseja deletar esse serviço?')" type="submit" class="action delete"><i class="icon fa fa-trash"></i></button>
              </form>
            </td>
          @endif
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

<script>
  const urlParams = new URLSearchParams(window.location.search);
  document.querySelector('input[name="name"]').value = urlParams.get('name');
  document.querySelector('input[name="category"]').value = urlParams.get('category');
</script>

@stop