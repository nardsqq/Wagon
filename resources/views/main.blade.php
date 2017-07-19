<!DOCTYPE html>
<html lang="en">
  <head>
    <!--Head-->
    @include('partials._head')
  </head>
  <body>
    <!--Navigation and Content-->
    <div class="branding"> 
      @include('partials._nav')
    </div>
    <br>
    @yield('content')
    @yield('meta')
    @include('partials._footer')
    <!--Scripts-->
    @include('partials._scripts')
  </body>
</html>
