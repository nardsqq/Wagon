@extends('main')

@section('title', '- Client View')

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
		      	<li>Product</li>
		      	<li>View Client</li>
		    </ol>
	   	</div>
	</section>

    <section id="main">
    	<div class="container animated fadeIn">
	        <div class="row">
		        <div class="col-md-12">
		          	<div class="panel panel-default">
			            <div class="panel-heading clearfix">
			              	<div class="btn-group pull-right">
			              		<a href="{{ route('client.index') }}" class="btn btn-success">Return to Client List</a>
			              	</div>
			              <div class="panel-title">
			                <h4>View Client Record</h4>
			              </div>
			            </div>
			            <div class="panel-body">	
			               	<div class="col-md-8">
								<h1>{{ $client->strClientName }} - 0 Active Quotation(s)</h1>
								<p class="lead">{{ $client->strClientAddLotNum }} {{ $client->strClientAddStreet }}, {{ $client->strClientAddBrgy }}, {{ $client->strClientAddCity }}, {{ $client->strClientAddProv }}</p>

								<hr>

								<div id="table-container">
					               	<table id="dataTable" class="table table-bordered table-hover table-condensed" width="100%">
									  <thead>
									    <tr>
									      <th>Transactions</th>
									      <th>Status</th>
									    </tr>
									  </thead>
									  <tbody>
									    <tr>
									        <td></td>
									        <td></td>
									    </tr>
									  </tbody>
									</table>
					            </div>
							</div>
							
							<div class="col-md-4">

								<div class="well">
									<dl>
									  <dt>Mobile Number </dt>
									  <dd>{{ $client->strClientTIN }}</dd>
									</dl>

									<dl>
									  <dt>Mobile Number </dt>
									  <dd>{{ $client->strClientMobile }}</dd>
									</dl>

									<dl>
									  <dt>Telephone Number </dt>
									  <dd>{{ $client->strClientTelephone }}</dd>
									</dl>

									<dl>
									  <dt>Email Address</dt>
									  <dd>{{ $client->strClientEmailAddress }}</dd>
									</dl>

									<dl>
									  <dt>FAX Number </dt>
									  <dd>{{ $client->strClientFax }}</dd>
									</dl>

									<hr>

									<div class="row">
										<div class="col-sm-12">
											{!! Html::linkRoute('client.edit', 'Edit Client Record', array($client->intClientID), array('class' => 'btn btn-primary btn-block')) !!}
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