<!DOCTYPE html>
<html>
<head>
	<title>
		@yield('title')
	</title>
	<style>
		table, td, th {
		    border: 0px;
		}

		table {
		    border-collapse: collapse;
		    width: 100%;
		}

		th {
		    height: 50px;
		}
	</style>
	<link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<div class="container-fluid">
		<!-- <span><img src="plugins/images/LandingPage/JUCEBER.png" height="200" width="200" align="left"></span> -->
		<center><h3 class="text-center" style="font-size: 27px"><b>MARINE SALES SERVICE,INC.</b>
		</h3></center>
		<center>RM 301 SUJECO BLDG, 1754 E.RODRIGUEZ SR AVE,<br> BRGY. IMACULATE CONCEPTION, CUBAO, QUEZON CITY</center>
		<center><b>Tel Nos:</b> 654-9284/415-6804</center>
		<center>LTO PSA-T-000121-2016</center>
		<center><b>Expiry Date:</b> 654-9284/415-6804</center>
		<center><b>email address:</b>cerbitojudy@yahoo.com</center>
		<br>
		<div class="col-md-3">
			<b>To:  </b>Chief,SOSIA<br>
			<b>Thru:  </b>Police Chief Inspector <br>	 Chief, Records Section <br>
			 
		</div>
		<br>
		<center><b style="font-size: 20px">@yield('report_title')</b></center>
		<center><b>From: </b>@yield('start_date')<b>To: </b>@yield('end_date')</center>
		
		
		<br>
		@yield('content')
		<br>
		<br>
		<div style="position:relative;">
		<p style="position: absolute; bottom: 0">
			I HEREBY CERTIFY the correctness disposition report for the month of <u></u>
			<br>
			<br>
			<div class="row">
				<p>Prepared by:</p>
				<div class="col-md-4">
					<h4>Bernard Paragas</h4>
					Asst. Xander Ford
				</div>
				<br>
				<p>Approved by:</p>
				<div class="col-md-4">
					<h4>Juel Mar Cerbito</h4>
					General Manager
				</div>
			</div>
		</p>
	</div>
	</div>
	
</body>
</html>	