<!DOCTYPE html>
<html lang="en">
  <head>

    <!--Meta-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="{{{ asset('anchor.ico') }}}">
    <title>Taitech - Wagon MSSMS</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{ asset('/css/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/bootstrap/bootstrap-toggle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('/DataTables/datatables.min.css') }}"/> --}}
    <link rel="stylesheet" href="{{ asset('/css/custom/wagon-style.css') }}">
    <link rel="stylesheet" href="{{ asset('/toastr-master/build/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/parsley.css') }}">

  </head>

  <body>

    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Wagon MSSMS</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Admin</a></li>
            <li><a href="#">Queries</a></li>
            <li><a href="#">Reports</a></li>
            <li><a href="#">Utilities</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="animated fadeIn"><a href="#">Welcome, User</a></li>
            <li><a href="#">Log Out</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <br>

    @yield('content')
    @yield('meta')

    <!--Scripts-->
    <script src="{{ asset('/js/jquery/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('/js/jquery-ui.min.js/') }}"></script>
    <script src="{{ asset('/js/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/js/bootstrap/bootstrap-toggle.min.js') }}"></script>
    {{-- <script src="{{ asset('/DataTables/datatables.min.js') }}"></script> --}}
    <script src="{{ asset('/toastr-master/build/toastr.min.js') }}"></script>
    <script src="{{ asset('/js/validate.js/') }}"></script>
    <script src="{{ asset('/js/jquery.validate.min.js/') }}"></script>
    <script src="{{ asset('/js/script.js/') }}"></script>
    <script src="{{ asset('/js/parsley.min.js/') }}"></script>
    <script src="{{ asset('/js/custom/autocollapse.js/') }}"></script>

    @yield('scripts')
  </body>
</html>
