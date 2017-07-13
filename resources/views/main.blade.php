<!DOCTYPE html>
<html lang="en">
  <head>
    <!--Head-->
    @include('partials._head')
  </head>
  <body>
    <!--Navigation and Content-->
    @include('partials._top')
    <br>
    @yield('content')
    @yield('meta')
    <!--Scripts-->
    @include('partials._scripts')
  </body>
</html>
