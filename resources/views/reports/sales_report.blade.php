<!DOCTYPE html>
<html>
<head>
	<title>Sales Report</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
	<div class="container-fluid">
		<center><h1>Sales Report</h1></center>
		<div class="row">
			<button class="btn btn-info" onclick="func_show('salesreport-pdf')">
				<span class="glyphicon glyphicon-list"></span> Generate pdf
			</button>
		</div>


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
		        <form id="date-range-form" method="GET" action="{{ url('/DispositionReports-pdf') }}">
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
			        <button type="submit" class="btn btn-primary">Save changes</button>
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			      </div>
	             </form>
		      </div>
		      
		    </div>
		  </div>
		</div>
	</div>
	<script src="{{ asset('/plugins/jquery-ui-1.12.1.custom/jquery.min.js') }}"></script>
	<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>

<script type="text/javascript">
	function func_show(newroute){
		$('#date-range-form').attr('action', newroute)
     	$('#thelegendarymodal').modal('show');
    }
</script>