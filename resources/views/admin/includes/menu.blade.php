<nav class="sidebar">
  <div class="top">
    <a href="{{ route("admin.dashboard.index") }}" class="logo-container">
      <img src="{{ asset('img/logo.svg') }}" alt="" class="logo">
    </a>

    <ul class="list">
      <li><a href="{{route('admin.auth.logout')}}" class="item"><i class="fas fa-sign-out-alt icon"></i></a></li>
      <li><a href="{{route('admin.auth.show')}}" class="item"><i class="fas fa-cog icon"></i></a></li>
    </ul>
  </div>

  <ul class="menu">
    <li>
      <a href="{{ route("admin.dashboard.schedule.index") }}" class="item @if(Request::segment(2) == "agenda") active @endif">
        Agenda
      </a>
    </li>

    <li>
      <a href="{{ route("admin.dashboard.services.index") }}" class="item @if(Request::segment(2) == "servicos") active @endif">
        Serviços
      </a>
    </li>
    @if(Auth::user()->function != 'client')
      <li>
        <a href="{{ route("admin.dashboard.clients.index") }}" class="item @if(Request::segment(2) == "clientes") active @endif">
          Clientes
        </a>
      </li>

      <li>
        <a href="{{ route("admin.dashboard.users.index") }}" class="item @if(Request::segment(2) == "usuarios") active @endif">
          Usuários
        </a>
      </li>
    @endif
  </ul>
</nav>