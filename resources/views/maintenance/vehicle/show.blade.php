@extends('main')

@section('title', '- Vehicle Details')

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
		      	<li>Vehicle Record</li>
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
			                <h4>View Vehicle Record</h4>
			              </div>
			            </div>
			            <div class="panel-body">	
			               	<div class="col-md-8">
								<h1>{{ $vehicle->vehitypes->strVehiTypeName }} Type - {{ $vehicle->strVehiModel }}</h1>
								<p class="lead">{{ $vehicle->strVehiPlateNumber }}</p>
							</div>
							<div class="col-md-4">

								<div class="well">
									<dl>
									  <dt>Vehicle Identification Number</dt>
									  <dd>{{ $vehicle->strVehiVIN }}</dd>
									</dl>

									<dl>
									   <dt>Net Capacity</dt>
									   <dd>{{ $vehicle->intVehiNetCapacity }}</dd>
									</dl>

									<dl>
									   <dt>Gross Weight</dt>
									   <dd>{{ $vehicle->intVehiGrossweight }} lbs.</dd>
									</dl>

									<hr>

									<div class="row">
										<div class="col-sm-12">
											<a href="{{ route('vehicle.index') }}" class="btn btn-block btn-default">
												<i class='fa fa-chevron-left'></i>&nbsp; Return to Vehicle Record List
											</a>
										</div>
									</div>

								</div>
							</div>
			            </div>
		          	</div>
		        </div>
	        </div>
    	</div>
	</section>
@endsection

@section('scripts')
	<script src="{{ asset('/js/ajax/vehicle-ajax.js/') }}"></script>
@endsection