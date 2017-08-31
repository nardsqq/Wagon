{{ Form::open(array('route' => 'role.store'))}}
  <div class="form-group">
    <label for="strRoleName">Role Name</label>
    <input type="text" id="strRoleName" name="strRoleName" class="form-control">
  </div>
  <div class="form-group">
    <label for="intSkillSetID">Skill Set</label>
    <select name="intSkillSetID[]" id="intSkillSetID" class="form-control role-multi" multiple="multiple">
      @foreach($skills as $skill)
        <option value="{{ $skill->intSkillID }}">{{ $skill->strSkillName }}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="txtRoleDesc">Description</label>
    <textarea class="form-control resize" rows="5" id="txtRoleDesc" name="txtRoleDesc"></textarea>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
  </div>
  <div class="form-group">
  	<a href="{{ route('role.index') }}" class="btn btn-default">Cancel, Return to Role List</a>
  	{!! Form::submit('Save Role', array('class' => 'btn btn-success pull-right')) !!}
  </div>
{!! Form::close() !!}