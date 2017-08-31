{!! Form::model($personnel, ['route' => ['personnel.update', $personnel->intPersID], 'method' => 'PUT']) !!}
    <div class="form-group">
      <label>Product</label>
      {!! Form::select('intPers_Role_ID', $roles, null, ['class' => 'form-control']) !!}﻿
    </div>
  <div class="row m-t-10">
    <div class="col-xs-4">
      <label for="strPersFName">First Name</label>
      {!! Form::text('strPersFName', null, ['class' => 'form-control']) !!}
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </div>
    <div class="col-xs-4">
      <label for="strPersMName">Middle Name</label>
      {!! Form::text('strPersMName', null, ['class' => 'form-control']) !!}
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </div>
    <div class="col-xs-4">
      <label for="strPersLName">Last Name</label>
      {!! Form::text('strPersLName', null, ['class' => 'form-control']) !!}
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </div>
  </div>
  <hr>
  <div class="form-group">
  	<a href="{{ route('personnel.index') }}" class="btn btn-default">Cancel, Return to Personnel List</a>
  	{!! Form::submit('Update Personnel Information', array('class' => 'btn btn-success pull-right')) !!}
  </div>
{!! Form::close() !!}