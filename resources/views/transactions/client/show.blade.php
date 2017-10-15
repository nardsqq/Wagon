@extends('main')

@section('title', '- Client Details')

@section('content')
	<header id="header">
	    <div class="container">
	      <div class="row">
	        <div class="col-md-10">
	          <h1><i class="fa fa-cogs fa-fw" aria-hidden="true"></i> Transactions</h1>
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
		      	<li>Client Record</li>
		    </ol>
	   	</div>
	</section>

	@include('maintenance.supplier.modal')

    <section id="main">
    	<div class="container animated fadeIn">
	        <div class="row">
		        <div class="col-md-12">
		          	<div class="panel panel-default">
			            <div class="panel-heading clearfix">
			              <div class="panel-title">
			                <h4>View Supplier "{{ $client->strClientName }}" Record</h4>
			              </div>
			            </div>
			            <div class="panel-body">	
			               	<div class="col-md-8">
								<h1>{{ $client->strClientName }}</h1>
								<h3>TIN: {{ $client->strClientTIN }}</h3>
								<p class="lead">
									{{ $client->strClientAddLotNum }}
									{{ $client->strClientAddStreet }}, 
									{{ $client->strClientAddBrgy }}, 
									{{ $client->strClientAddCity }}, 
									{{ $client->strClientAddProv }}
								</p>
							</div>
							<div class="col-md-4">

								<div class="well">
									<dl>
									  <dt>Telephone Number</dt>
									  <dd>{{ $client->strClientTelephone }}</dd>
									</dl>

									<dl>
									   <dt>FAX Number</dt>
									   <dd>{{ $client->strClientFax }}</dd>
									</dl>

									<dl>
									   <dt>Mobile Number</dt>
									   <dd>{{ $client->strClientMobile }}</dd>
									</dl>

									<dl>
									   <dt>Email Address</dt>
									   <dd>{{ $client->strClientEmailAddress }}</dd>
									</dl>

									<hr>

									<div class="row">
										<div class="col-sm-12">
											<a href="{{ route('client.index') }}" class="btn btn-block btn-default">
												<i class='fa fa-chevron-left'></i>&nbsp; Return to Client Record List
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