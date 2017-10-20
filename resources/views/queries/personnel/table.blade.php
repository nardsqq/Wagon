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
      {!! Form::label('strPersFName', 'First Name') !!}
      <select name="strPersFName" id="strPersFName" class="form-control">
        <option value="Regular">Regular</option>
        <option value="Contractual">Contractual</option>
      </select>
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
        <td>Data</td>
        <td>Data</td>
        <td>Data</td>
        <td>Data</td>
      </tr>
  </tbody>
</table>

