@extends('main')

@section('content')
  <header id="header">
    <div class="container">
      <div class="row">
        <div class="col-md-10">
          <h1><i class="fa fa-tasks" aria-hidden="true"></i> Admin</h1>
        </div>
        <div class="col-md-2">

        </div>
      </div>
    </div>
  </header>

  <div class="container fadeIn">
    @include('partials._menu')
  </div>
  <section id="breadcrumb">
    <div class="container animated fadeIn">
      {!! Breadcrumbs::render('admin') !!}
    </div>
  </section>
@endsection
