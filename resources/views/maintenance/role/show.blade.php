@extends('main')

@section('title', '- Role View')

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
		      	<li>Role</li>
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
			              		<a href="{{ route('role.index') }}" class="btn btn-success">Return to Role List</a>
			              	</div>
			              <div class="panel-title">
			                <h4>View Role Details</h4>
			              </div>
			            </div>
			            <div class="panel-body">	
			               	<div class="col-md-8">
								<h1>{{ $role->strRoleName }}</h1>
			               		<hr>
								<p class="lead">{{ $role->txtRoleDesc }}</p>
							</div>
							<div class="col-md-4">

								<div class="well">

									<dl>
									  <dt>Skill Set </dt>
									  <dd>
										@foreach($role->skills as $skill)
											<span class="label label-default">{{ $skill->strSkillName }}</span>
										@endforeach
									  </dd>
									</dl>

									<hr>

									<div class="row">
										<div class="col-sm-12">
											{!! Html::linkRoute('role.edit', 'Edit Role', array($role->intRoleID), array('class' => 'btn btn-primary btn-block')) !!}
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