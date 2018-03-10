@extends('main')
@section('content')

 <header id="header">
    <div class="container">
      <div class="row">
        <div class="col-md-10">
          <h1><i class="fa fa-cogs fa-fw" aria-hidden="true"></i> Queries</h1>
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
        <li>Queries</li>
        <li>Orders</li>
      </ol>
    </div>
  </section>

  <section id="main">
    <div class="container animated fadeIn">
      <div class="row">
        <div class="col-md-12">
          <div class="alert alert-success alert-white rounded">
            <div class="icon">
              <i class="fa fa-info-circle"></i>
            </div>
            <strong>Search for <i>Order Records</i> here.</strong>
            <br>
            <small>Search by <i>Order Data</i>.</small>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading clearfix">
              <div class="panel-title">
                <h4>Queries - Orders</h4>
              </div>
            </div>
            <div class="panel-body">
              <div id="table-container">
                @include('queries.order.table')
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
    $( document ).ready( function(){
      $('.dt-buttons').css('float', 'right');
    }); 
    
    $(document).on('submit', '#adv-search-form', function(e) {
        e.preventDefault();
        e.stopImmediatePropagation();
        
        datatable.ajax.reload();
        return false;

    });

    var datatable = $('#dataTable').DataTable({
        processing: true,
        ajax: {
            url: '{!! URL::current() !!}?filter=true',
            data: function(){
                @yield('datatable-ajax-data')
            }
        },
        fixedHeader: true,
        columns: [
            @yield('datatable-columns')
        ],
        responsive: true,
        dom: "<'row m-b-15'<'col-sm-6'l><'col-sm-6'B>><'row'<'col-sm-12'tr>><'row m-t-15'<'col-sm-5'i><'col-sm-7'p>>",
        //dom: 'Bfrtip',
        buttons: [
            {
                extend: 'csv',
                exportOptions: {
                    columns: ':not([aria-label=Action]):not(.exclude)'
                }
            },
            {
                extend: 'excel',
                exportOptions: {
                    columns: ':not([aria-label=Action]):not(.exclude)'
                }
            },
            {
                extend: 'pdf',
                exportOptions: {
                    columns: ':not([aria-label=Action]):not(.exclude)'
                },
                filename: "@yield('filename'){{ date('c') }}",
            },
            {
                extend: 'print',
                exportOptions: {
                    columns: ':not([aria-label=Action]):not(.exclude)'
                },
                customize: function(win){
                    $(win.document.body).css('font-size', '14px');
                    let table = $(win.document.body).find('table').css('font-size', 'inherit');
                    $(table).find('td').css('padding', '0.5rem')
                    $(table).find('th').css('font-weight', 'bold');
                }
            },
        ],
    });
    // FILTERS
    $('#adv-search-form').on('keyup, change', 'input, select, .form-control', function(e){
          datatable.columns([$(this).attr('data-index')]).search($(this).val(), false, false, $(this).attr('data-insensitive')==='false'?false:true);
      });
      
  </script>
@endsection
