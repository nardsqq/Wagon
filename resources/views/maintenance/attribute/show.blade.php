@extends('main')

@section('title', "- $attrib->strAttribName Attribute")

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
		      	<li>Attributes</li>
		      	<li>View</li>
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
			              		<a href="{{ route('attributes.index') }}" class="btn btn-success">Return to Attributes List</a>
			              	</div>
			              <div class="panel-title">
			                <h4>View Attribute Details</h4>
			              </div>
			            </div>
			            <div class="panel-body">	
			               	<h1>{{ $attrib->strAttribName }} Attribute - Attached to {{ $attrib->products()->count() }} Product(s)</h1> 
			               	<hr>
			               	<div id="table-container">
				               	<table id="dataTable" class="table table-bordered table-hover table-condensed" width="100%">
								  <thead>
								    <tr>
								      <th>Product</th>
								      <th>Attributes</th>
								    </tr>
								  </thead>
								  <tbody>
								    @foreach ($attrib->products as $product)
								    <tr id="{{ $product->intProdID }}">
								        <td>{{ $product->strProdName }}</td>
								        <td>
								        	@foreach($product->attribs as $attrib)
								        		<span class="label label-default">{{ $attrib->strAttribName }}</span>
								        	@endforeach
								        </td>
								    </tr>
								    @endforeach
								  </tbody>
								</table>
				            </div>
			            </div>
		          	</div>
		        </div>
	        </div>
    	</div>
	</section>
@endsection