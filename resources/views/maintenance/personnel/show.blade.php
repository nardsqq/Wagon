@extends('main')

@section('title', '- Product View')

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
		      	<li>View</li>
		    </ol>
	   	</div>
	</section>

	@include('maintenance.product.modal')

    <section id="main">
    	<div class="container animated fadeIn">
	        <div class="row">
		        <div class="col-md-12">
		          	<div class="panel panel-default">
			            <div class="panel-heading clearfix">
			              	<div class="btn-group pull-right">
			              		<a href="{{ route('product.index') }}" class="btn btn-success">Return to Product List</a>
			              	</div>
			              <div class="panel-title">
			                <h4>View Product Details</h4>
			              </div>
			            </div>
			            <div class="panel-body">	
			               	<div class="col-md-8">
								<h1>{{ $product->strProdName }}</h1>
								@foreach($product->attribs as $attrib)
									<span class="label label-default">{{ $attrib->strAttribName }}</span>
								@endforeach
			               		<hr>
								<p class="lead">{{ $product->txtProdDesc }}</p>
							</div>
							<div class="col-md-4">

								<div class="well">
									<dl>
									  <dt>Category </dt>
									  <dd>{{ $product->prodcategs->strProdCategName }}</dd>
									</dl>

									<dl>
									  <dt>Handle </dt>
									  <dd>{{ $product->strProdHandle }}</dd>
									</dl>

									<dl>
									  <dt>Stock Keeping Unit </dt>
									  <dd>{{ $product->strProdSKU }}</dd>
									</dl>

									<hr>

									<div class="row">
										<div class="col-sm-12">
											{!! Html::linkRoute('product.edit', 'Edit Product', array($product->intProdID), array('class' => 'btn btn-primary btn-block')) !!}
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