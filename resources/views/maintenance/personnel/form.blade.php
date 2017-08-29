{{ Form::open(array('route' => 'personnel.store'))}}
  <div class="row">
    <div class="col-xs-12">
      <label for="">Personnel Role</label>
      <select name="intPers_Role_ID" id="intPers_Role_ID" class="form-control">
        @foreach ($roles as $role)
          <option value="{{$role->intRoleID}}">{{ $role->strRoleName }}</option>
        @endforeach
      </select>
    </div>
  </div>
  <div class="row m-t-10">
    <div class="col-xs-4">
      <label for="strPersFName">First Name</label>
      <input type="text" id="strPersFName" name="strPersFName" class="form-control">
    </div>
    <div class="col-xs-4">
      <label for="strPersMName">Middle Name</label>
      <input type="text" id="strPersMName" name="strPersMName" class="form-control">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </div>
    <div class="col-xs-4">
      <label for="strPersLName">Last Name</label>
      <input type="text" id="strPersLName" name="strPersLName" class="form-control">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </div>
  </div>
  <div class="form-group">
  	<a href="{{ route('personnel.index') }}" class="btn btn-default">Cancel, Return to Personnel List</a>
  	{!! Form::submit('Save Personnel Record', array('class' => 'btn btn-success pull-right')) !!}
  </div>
{!! Form::close() !!}