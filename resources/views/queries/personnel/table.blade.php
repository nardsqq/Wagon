<form>
  <div class="row">
    <div class="col-xs-4">
      {!! Form::label('strPersEmpType', 'Regulation') !!}
      <select name="strPersEmpType" id="strPersEmpType" class="form-control">
        <option value="Regular">Regular</option>
        <option value="Contractual">Contractual</option>
      </select>
    </div>
    <div class="col-xs-4">
      {!! Form::label('intPers_Role_ID', 'Role') !!}
      {!! Form::text('intPers_Role_ID', null, ['id' => 'intPers_Role_ID', 'class' => 'form-control']) !!}
    </div>
    <div class="col-xs-4">
      {!! Form::label('strPersMobNo', 'Mobile Number') !!}
      {!! Form::text('strPersMobNo', null, ['id' => 'strPersMobNo', 'class' => 'form-control']) !!}
    </div>
  </div>
  <div class="row m-t-10">
    <div class="col-xs-4">
      {!! Form::label('strPersMName', 'First Name') !!}
      {!! Form::text('strPersMName', null, ['id' => 'strPersFName', 'class' => 'form-control']) !!}
    </div>
    <div class="col-xs-4">
      {!! Form::label('strPersMName', 'Middle Name') !!}
      {!! Form::text('strPersMName', null, ['id' => 'strPersMName', 'class' => 'form-control']) !!}
    </div>
    <div class="col-xs-4">
      {!! Form::label('strPersLName', 'Last Name') !!}
      {!! Form::text('strPersLName', null, ['id' => 'strPersLName', 'class' => 'form-control']) !!}
    </div>
  </div>
  <div class="row">
    <br>
    <div class="col-xs-12">
      <button type="button" id="go" onclick="search()" class="btn btn-success col-xs-12" name="button">GO</button>
    </div>
  </div>
</form>

<hr>

<table id="dataTable" class="table table-bordered table-hover" style="visibility: hidden;" width="100%">
  <thead>
    <tr>
      <th>Role</th>
      <th>Regulation</th>
      <th>Full Name</th>
      <th>Mobile Number</th>
    </tr>
  </thead>
  <tbody id="prod-list">
      <tr id="">
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
  </tbody>
</table>
