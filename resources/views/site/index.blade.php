<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="{{ asset('css/site/style.css') }}">
  <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon">

  <title>Fatec Beauty Hair</title>
</head>
<body>
  
  <main class="home-page">
    <header class="header">
      <div class="container content">
        <a href="#" class="logo-container">
          <img src="{{ asset('img/logo.svg') }}" alt="" class="logo">
        </a>

        <a href="{{ route('admin.dashboard.schedule.index') }}" class="restrict">
          <button class="button">
            <i class="icon fas fa-lock"></i>
            Área Restrita
          </button>
        </a>
      </div>
    </header>

    <section class="banner">
      <div id="banner-carousel">
        <div class="item">
          <img src="{{ asset('img/banner-1.jpg') }}" alt="" class="image">
        </div>
      </div>

      <div class="content container">
        <h1 class="title">Fatec Beauty Hair</h1>
        <p class="desc">Conheça nosso salão e faça um agendamento agora mesmo</p>
      </div>
    </section>

    <section class="servicos">
      <div class="content container">

        @foreach($services as $service)
          <div class="card">
            <h2 class="title">{{ $service->name }}</h2>
            <p class="category">{{ $service->category }}</p>

            <div class="price">R$ {{ $service->price }}</div>

            <a href="{{ route('admin.dashboard.schedule.index') }}" class="link">Agende já</a>
          </div>
        @endforeach

      </div>
    </section>

    <footer class="footer">
      <p class="desc">Copyright - Todos os direitos reservados</p>
    </footer>
  </main>

</body>
</html>