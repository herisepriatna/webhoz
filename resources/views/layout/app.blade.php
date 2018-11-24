<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>FirstLaravelProject - @yield('tittle')</title>
  </head>
  <body>
    <ul class="nav-bar">
      @section("nav-bar")
      <li><a href=""#>Home</a></li>
      @show
    </ul>
    <header>Hello World!!</header>
    <div class="container">
      @yield('containter')
  </body>
</html>
