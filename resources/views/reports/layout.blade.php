@extends('main')
@section('title')
    @yield('report-name')
@endsection
@section('content')

 <header id="header">
    <div class="container">
      <div class="row">
        <div class="col-md-10">
          <h1><i class="fa fa-cogs fa-fw" aria-hidden="true"></i> Transactions</h1>
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
        <li>Reports</li>
        <li>@yield('report-name')</li>
      </ol>
    </div>
  </section>

{{--  <div id="thelegendarymodal" class="modal fade">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><center>Date Range</center></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="date-range-form" method="GET" action="{{ url('/stocks-report-pdf') }}">
          <div class="col-md-6">
            <div class="form-group">
              <label>Starts From:</label>
              <input type="date" class="form-control" name="startDate" required>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Ends To:</label>
              <input type="date" class="form-control" name="endDate" required>
            </div>
          </div>
          <br><br>
          <div class="modal-footer">
	        <button type="submit" class="btn btn-primary">Save Changes</button>
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
	      </div>
         </form>
      </div>
      
    </div>
  </div>
</div>  --}}

  <section id="main">
    <div class="container animated fadeIn">
      <div class="row">
        <div class="col-md-12">
          <div class="alert alert-success alert-white rounded">
            <div class="icon">
              <i class="fa fa-info-circle"></i>
            </div>
            <strong>Generate your <i>@yield('report-name')</i> here.</strong>
            <br>
            <small>Select a <i><b>date range</b></i>.</small>
          </div>  
          <div class="panel panel-default">
            <div class="panel-heading clearfix">
                <div class="col-md-12">
                    <div class="col-xs-6">
                        <div class="panel-title">
                            <h4>@yield('report-name')</h4>
                        </div>
                    </div>
                    <div class="col-xs-6">
                            <input id="custom" class="form-control input-daterange-datepicker" type="text" name="daterange" value="01/01/2015 - 01/31/2015">
                        {{--  <div class="col-xs-6"> 
                            <div class="btn-group pull-right">
                                <button class="btn btn-success" onclick="datatable.ajax.reload()">
                                    <i class="fa fa-file-text-o fa-fw" aria-hidden="true"></i>&nbsp; Generate Report
                                </button>
                            </div>
                        </div>  --}}
                    </div>
                </div>
            </div>
            <div class="panel-body">
              <div id="table-container">
                <table id="dataTable" class="table table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    @yield('table')
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

@section('styles')
<link href="{{ asset('plugins/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">
@endsection

@section('scripts')
  <script src="{{ asset('js/moment.min.js') }}"></script>
  <script src="{{ asset('plugins/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
  <!-- Delay table load until everything else is loaded -->
  <script>
    $(window).on('load', function(){
        $('#dataTable').removeAttr('style');
    });
  </script>

  <script type="text/javascript">
    $( document ).ready( function(){
        $('.dt-buttons').css('float', 'right');
    });
        $startDate = moment().startOf('month').format('YYYY-MM-DD');
        $endDate = moment().endOf('month').format('YYYY-MM-DD');

	function func_show(newroute){
		$('#date-range-form').attr('action', newroute)
        $('#thelegendarymodal').modal('show');
    }

    $('.input-daterange-datepicker').daterangepicker({
            "showDropdowns": true,
            "showWeekNumbers": true,
            ranges: {
                'Today': [moment(), moment()],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
                'This Year': [moment().startOf('year'), moment().endOf('year')],
                'Last Year': [moment().subtract(1, 'year').startOf('year'), moment().subtract(1, 'year').endOf('year')],                
            },
            "linkedCalendars": false,
            "alwaysShowCalendars": true,
            "startDate": moment().startOf('month'),
            "endDate": moment().endOf('month'),
            "applyClass": "btn-info"
        }, function(start, end, label) {
            console.log("New date range selected: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')');
            
            $startDate = start.format('YYYY-MM-DD') ;
            $endDate = end.format('YYYY-MM-DD');
            datatable.ajax.reload();
        });
        
        var datatable = $('#dataTable').DataTable({
            processing: true,
            ajax: {
                url: '{!! URL::current() !!}?filter=true',
                data: function(d){
                    d.startDate = ($('.input-daterange-datepicker').data('daterangepicker').startDate).format('YYYY-MM-DD');
                    d.endDate = ($('.input-daterange-datepicker').data('daterangepicker').endDate).format('YYYY-MM-DD');
                    @yield('datatable-ajax-data')
                }
            },
            footerCallback: function(first, second, third, fourth){
                console.log(first, second, third, fourth);
                this.api().columns('.sum').every(function(){
                    var column = this;

                    var sum = column
                        .data()
                        .reduce(function (a, b) { 
                        a = parseInt(a, 10);
                        if(isNaN(a)){ a = 0; }                   

                        b = parseInt(b, 10);
                        if(isNaN(b)){ b = 0; }
                            return a + b;
                        }, 0);
                    
                    var span = document.createElement("div");
                    span.className = 'font-bold text-right';
                    // i need an if statement
                    span.innerText = parseFloat(sum).toLocaleString('en-PH', {'minimumFractionDigits':2, 'maximumFractionDigits':2});
                    $(span).appendTo($(column.footer()).empty());
                });
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
                    footer: true,
                    exportOptions: {
                        columns: ':not([aria-label=Action]):not(.exclude)'
                    }
                },
                {
                    extend: 'excel',
                    footer: true,
                    exportOptions: {
                        columns: ':not([aria-label=Action]):not(.exclude)'
                    }
                },
                {
                    extend: 'pdf',
                    footer: true,
                    exportOptions: {
                        columns: ':not([aria-label=Action]):not(.exclude)'
                    },
                    customize: function ( doc ) {
                        doc.content[1].table.widths = Array(doc.content[1].table.body[0].length + 1).join('*').split('');
                        doc.content.splice( 0, 0, {
                            fontSize: 16,
                            margin: [0, 0, 0, 10],
                            alignment: 'center',
                            text: `MARINE SALES AND SERVICES MANAGEMENT SYSTEM`,
                        });
                        doc.content.splice( 2, 0, {
                            fontSize: 11,
                            margin: [0, 0, 0, 5],
                            alignment: 'center',
                            text: ($('.input-daterange-datepicker').data('daterangepicker').startDate).format('YYYY-MM-DD') +' to '+($('.input-daterange-datepicker').data('daterangepicker').endDate).format('YYYY-MM-DD'),
                        });
                    },
                    filename: "@yield('report-name'){{ date('c') }}",
                },
                {
                    extend: 'print',
                    footer: true,
                    exportOptions: {
                        columns: ':not([aria-label=Action]):not(.exclude)'
                    },
                    title: `
                        <center>
                            <h3>MARINE SALES AND SERVICES MANAGEMENT SYSTEM</h3>
                            <span style="font-size: 20px">@yield('report-name')<br></span>
                            <span style="font-size: 12px">${$startDate} to  ${$endDate} <br></span>
                        </center>
                    `,
                    customize: function(win){
                        $(win.document.body).css('font-size', '14px');
                        let table = $(win.document.body).find('table').css('font-size', 'inherit');
                        $(table).find('td').css('padding', '0.5rem')
                        $(table).find('th').css('font-weight', 'bold');
                    }
                },
            ],
            columnDefs: [
                {
                    "render": function ( data, type, row ) {
                        console.log(data);
                        return parseFloat(data).toLocaleString('en-PH', {'minimumFractionDigits':2, 'maximumFractionDigits':2});
                    },
                    "class" : "text-right",
                    "targets": ['money']
                },
            ]
        });

        $('#datepickers').on('change', '.datepicker', function(e){
            $startDate = ($('.input-daterange-datepicker').data('daterangepicker').startDate).format('YYYY-MM-DD');
            $endDate = ($('.input-daterange-datepicker').data('daterangepicker').endDate).format('YYYY-MM-DD');
            datatable.ajax.reload();
        });
        
    </script>
@endsection
