@extends('main')
@section('content')

 <header id="header">
    <div class="container">
      <div class="row">
        <div class="col-md-10">
          <h1><i class="fa fa-bar-chart" aria-hidden="true"></i> Transactions</h1>
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
        <li>Transactions</li>
        <li>Quotations</li>
      </ol>
    </div>
  </section>

  @include('transactions.quotation.modal')

  <section id="main">
    <div class="container animated fadeIn">
      <div class="row">
        <div class="col-md-12">
          <div class="alert alert-success alert-white rounded">
            <div class="icon">
              <i class="fa fa-info-circle"></i>
            </div>
            <strong>Manage your <i>Quotations</i> here.</strong>
            <br>
            <small>Create and Manage <i><b>Quotations</b></i>.</small>
          </div>  
          <div class="panel panel-default">
            <div class="panel-heading clearfix">
              <div class="btn-group pull-right">
                <button type="button" id="btn-add" class="btn btn-success"><i class="fa fa-plus-square"></i>&nbsp; Create Quotation</button>
              </div>
              <div class="panel-title">
                <h4>Quotations</h4>
              </div>
            </div>
            <div class="panel-body">
              <div id="table-container">
                @include('transactions.quotation.table')
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
   
  </section>
@endsection

@section('scripts')

  <!-- Delay table load until everything else is loaded -->
  <script>
    $(window).on('load', function() {
        $('#dataTable').removeAttr('style');
    })
  </script>

  <script>
    $(document).on('ready', function() {
      $.fn.modal.Constructor.prototype.enforceFocus = function() {};
      $('#prodsearch').select2();
      $('#servsearch').select2();
      $('#intClientID').select2();
      $('#strClientAssoc').select2();
      $('#strQuotHeadLocation').select2();
    })
  </script>

  <script src="{{ asset('/js/ajax/transactions/quotation-ajax.js/') }}"></script>

  <script type="text/javascript">
    $(document).ready(function () {
      // example: if user clicks 
      $('#btn-prod').click(function () {
        $(this).addClass('btn-primary').removeClass('btn-default');
        $('#btn-serv').removeClass('btn-primary').addClass('btn-default');
        $('#display-area').html($('#content-a').html());
      });
      
      $('#btn-serv').click(function () {
        $(this).addClass('btn-primary').removeClass('btn-default');
        $('#btn-prod').removeClass('btn-primary').addClass('btn-default');
        $('#display-area').html($('#content-b').html());
      });
      
    });
  </script>

@endsection