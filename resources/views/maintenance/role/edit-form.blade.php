{!! Form::model($role, ['route' => ['role.update', $role->intRoleID], 'method' => 'PUT']) !!}
  <div class="form-group">
    <label for="strRoleName">Role Name</label>
    {!! Form::text('strRoleName', null, ["class" => "form-control"]) !!}
  </div>
  <div class="form-group">
    <label for="intSkillSetID">Skill Set</label>
    {!! Form::select('intSkillSetID[]', $skills, null, ['class' => 'form-control role-multi', 'multiple' => 'multiple']) !!}
  </div>
  <div class="form-group">
    <label for="txtRoleDesc">Description</label>
    {!! Form::textarea('txtRoleDesc', null, ["class" => "form-control resize"]) !!}
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
  </div>
  <div class="form-group">
  	<a href="{{ route('product.index') }}" class="btn btn-default">Cancel, Return to Role List</a>
  	{!! Form::submit('Update Role Details', array('class' => 'btn btn-success pull-right')) !!}
  </div>
{!! Form::close() !!}