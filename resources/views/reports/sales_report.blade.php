@extends('main')
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
        <li>Stocks Report</li>
      </ol>
    </div>
  </section>

<div id="thelegendarymodal" class="modal fade">
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
              <input type="date" class="form-control" name="startFrom" required>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Ends To:</label>
              <input type="date" class="form-control" name="endTo" required>
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
</div>

  <section id="main">
    <div class="container animated fadeIn">
      <div class="row">
        <div class="col-md-12">
          <div class="alert alert-success alert-white rounded">
            <div class="icon">
              <i class="fa fa-info-circle"></i>
            </div>
            <strong>Generate your <i>Stocks Report</i> here.</strong>
            <br>
            <small>Select a <i><b>date range</b></i>.</small>
          </div>  
          <div class="panel panel-default">
            <div class="panel-heading clearfix">
              <div class="btn-group pull-right">
                <button class="btn btn-success" onclick="func_show('salesreport-pdf')">
					<i class="fa fa-file-text-o fa-fw" aria-hidden="true"></i>&nbsp; Generate Report
				</button>
              </div>
              <div class="panel-title">
                <h4>Stocks Report</h4>
              </div>
            </div>
            <div class="panel-body">
              <div id="table-container">
                
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
    $(window).on('load', function(){
        $('#dataTable').removeAttr('style');
    })
  </script>

  <script type="text/javascript">
	function func_show(newroute){
		$('#date-range-form').attr('action', newroute)
     	$('#thelegendarymodal').modal('show');
	    }
	</script>
@endsection
