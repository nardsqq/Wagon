<form>
  <div class="row">
    <div class="col-xs-4">
      {!! Form::label('intSA_ServType_ID', 'Service Type') !!}
      {!! Form::text('intSA_ServType_ID', null, ['id' => 'intSA_ServType_ID', 'class' => 'form-control']) !!}
    </div>
    <div class="col-xs-4">
      {!! Form::label('strServAreaName', 'Service') !!}
      {!! Form::text('strServAreaName', null, ['id' => 'strServAreaName', 'class' => 'form-control']) !!}
    </div>
    <div class="col-xs-4">
      {!! Form::label('txtServAreaDesc', 'Description') !!}
      {!! Form::text('txtServAreaDesc', null, ['id' => 'txtServAreaDesc', 'class' => 'form-control']) !!}
    </div>
  </div>
  <br>
  <div class="row">
    <button type="button" id="go" onclick="search()" class="btn btn-success col-xs-12" name="button">GO</button>
  </div>
</form>

<hr>

<table id="dataTable" class="table table-bordered table-hover" style="visibility: hidden;" width="100%">
  <thead>
    <tr>
      <th>Service Type</th>
      <th>Service Area</th>
      <th>Description</th>
    </tr>
  </thead>
  <tbody id="serv-list">
      <tr id="">
        <td></td>
        <td></td>
        <td></td>
      </tr>
  </tbody>
</table>
