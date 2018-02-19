@extends('main')

@section('title', '- Supplier Details')

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
		      	<li>Supplier Record</li>
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
			                <h4>View Supplier Record</h4>
			              </div>
			            </div>
			            <div class="panel-body">	
			               	<div class="col-md-8">
								<h1>{{ $supplier->str_supplier_name }}</h1>
								<p class="lead">{{ $supplier->txt_supplier_address }}</p>
							</div>
							<div class="col-md-4">

								<div class="well">
									<dl>
									  <dt>Supplier Contact Detail</dt>
									  <dd>{{ $supplier->str_supplier_mobile_num }}</dd>
									</dl>


									<hr>

									<div class="row">
										<div class="col-sm-12">
											<a href="{{ route('supplier.index') }}" class="btn btn-block btn-default">
												<i class='fa fa-chevron-left'></i>&nbsp; Return to Supplier Record List
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