@extends('admin.layouts.master')

@section('content')

<div class="create-page">

  <h2 class="title">Editar Usuário</h2>

  @include('admin.includes.messages')

  <form action="{{route('admin.dashboard.services.update', ['id' => $service->id])}}" method="POST" class="form">
    @csrf
    <div class="row">
      <div class="col">
        <label class="label center">
          Nome:
          <input type="text" name="name" value='{{ $service->name }}' class="input" required>
        </label>

        <label class="label center">
          Categoria:
          <input type="text" name="category" value='{{ $service->category }}' class="input" required>
        </label>

        <label class="label center">
          Preço:
          <input type="text" name="price" value='{{ $service->price }}' class="input" required>
        </label>
      </div>
    </div>

    <div class="row">
      <div class="col row">
        <a href="{{ route('admin.dashboard.services.index') }}" class="button-container">
          <button type="button" class="button">Cancelar</button>
        </a>

        <button type="submit" class="button colored">Salvar</button>
      </div>
    </div>
  </form>

</div>

@stop