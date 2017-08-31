@extends('main')

@section('content')

 <header id="header">
    <div class="container">
      <div class="row">
        <div class="col-md-10">
          <h1><i class="fa fa-cogs fa-fw" aria-hidden="true"></i> Maintenance</h1>
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
      <ol class="breadcrumb">
        <li>Admin</li>
        <li>Maintenance</li>
        <li>Role</li>
        <li>Create</li>
      </ol>
    </div>
  </section>

  <section id="main">
    <div class="container animated fadeIn">
      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-heading clearfix">
              <div class="panel-title">
                <h4>Create New Role</h4>
              </div>
            </div>
            <div class="panel-body">
              <div id="table-container">
                @include('maintenance.role.form')
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </section>
@endsection

@section('scripts')

  <script>
    $('.role-multi').select2({ placeholder: "Select Skill(s)", minimumResultsForSearch: -1 });
  </script>

@endsection
