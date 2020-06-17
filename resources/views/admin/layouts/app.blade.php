<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8">
    <title>@yield('title')- Título Default</title>
    @stack('styles')
  </head>
  <body>
    @yield('content')

    @stack('scripts')
  </body>
</html>
