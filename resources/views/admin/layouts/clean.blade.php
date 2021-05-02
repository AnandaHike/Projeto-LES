<!DOCTYPE html>
<html lang="pt-br">

<head>
  @include('admin.includes.head')

  @yield('css')
</head>

<body>

  @yield('content')

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
  <script src="{{ asset('js/main-min.js') }}"></script>
  @yield('js')
</body>

</html>