    <!--Meta-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="{{{ asset('big-anchor.ico') }}}">
    <title>MRN & IND SSMS @yield('title')</title>

    <!-- Core Stylesheets -->
    <link rel="stylesheet" href="{{ asset('/DataTables/datatables.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('/plugins/jquery-ui-1.12.1.custom/jquery-ui.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/toastr-master/build/toastr.min.css') }}">
