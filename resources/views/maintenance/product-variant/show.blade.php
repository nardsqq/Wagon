@extends('main')

@section('title', '- Variant Details')

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
		      	<li>Product Variant Record</li>
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
			                <h4>View Product Variant Record</h4>
			              </div>
			            </div>
			            <div class="panel-body">	
			               	<div class="col-md-8">
								<h2>{{ $variant->brands->strBrandName }} {{ $variant->products->strProdName }} {{ $variant->strVarModel }}</h2>
								<hr>
								<p class="lead">{{ $variant->txtVarDesc }}</p>
								<p class="lead"> Specification:</p>
									@foreach($variant->dimensions as $dimension)
										<ul>
											<li>
												{{ $dimension->strDimenValue }}
											</li>
										</ul>
									@endforeach

							</div>
							<div class="col-md-4">

								<div class="well">
									<dl>
									  <dt>Re-Stock Level</dt>
									  <dd>{{ $variant->intVarReStockLevel }}</dd>
									</dl>

									<dl>
									   <dt>Handle</dt>
									   <dd>{{ $variant->strVarHandle }}</dd>
									</dl>

									<hr>

									<div class="row">
										<div class="col-sm-12">
											<a href="{{ route('product-variant.index') }}" class="btn btn-block btn-default">
												<i class='fa fa-chevron-left'></i>&nbsp; Return to Product Variant Record List
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