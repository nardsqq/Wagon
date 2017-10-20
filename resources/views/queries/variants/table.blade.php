<form>
  <div class="form-group">
      {!! Form::label('strVarPartNum', 'Part Number') !!}
      {!! Form::text('strVarPartNum', null, ['id' => 'strVarPartNum', 'class' => 'form-control']) !!}
  </div>
  <div class="row m-t-10">
    <div class="col-xs-4">
      {!! Form::label('intV_Brand_ID', 'Brand') !!}
      {!! Form::text('intV_Brand_ID', null, ['id' => 'intV_Brand_ID', 'class' => 'form-control']) !!}
    </div>
    <div class="col-xs-4">
      {!! Form::label('intV_Prod_ID', 'Product Name') !!}
      {!! Form::text('intV_Prod_ID', null, ['id' => 'intV_Prod_ID', 'class' => 'form-control']) !!}
    </div>
    <div class="col-xs-4">
      {!! Form::label('strVarModel', 'Model') !!}
      {!! Form::text('strVarModel', null, ['id' => 'strVarModel', 'class' => 'form-control']) !!}
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
      <th>Part Number</th>
      <th>Brand</th>
      <th>Product Name</th>
      <th>Model</th>
    </tr>
  </thead>
  <tbody id="serv-list">
      <tr id="">
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
  </tbody>
</table>
