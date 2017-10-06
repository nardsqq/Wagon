<div class="modal fade" id="add_vehi" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal-header-success" id="vehi-modal-header">
        <h4 id="title">Add New Vehicle Record</h4>
      </div>
      <div class="modal-body">
        {!! Form::open(['url' => '/admin/maintenance/vehicle', 'method' => 'POST', 'id' => 'formVehi']) !!}
          <div class="form-group">
            {!! Form::label('intV_VehiType_ID', 'Vehicle Type') !!}
            <select name="intV_VehiType_ID" id="intV_VehiType_ID" class="form-control">
              @foreach($vehitypes as $vehitype)
                <option value="{{ $vehitype->intVehiTypeID }}">{{ $vehitype->strVehiTypeName }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            {!! Form::label('strVehiModel', 'Vehicle Model') !!}
            {!! Form::text('strVehiModel', null, ['id' => 'strVehiModel', 'class' => 'form-control']) !!}
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          </div>
          <div class="form-group">
            {!! Form::label('strVehiPlateNumber', 'Plate Number') !!}
            {!! Form::text('strVehiPlateNumber', null, ['id' => 'strVehiPlateNumber', 'class' => 'form-control']) !!}
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          </div>
          <div class="form-group">
            {!! Form::label('strVehiVIN', 'VIN') !!}
            {!! Form::text('strVehiVIN', null, ['id' => 'strVehiVIN', 'class' => 'form-control']) !!}
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          </div>
          <div class="form-group">
            {!! Form::label('intVehiNetCapacity', 'Net Capacity') !!}
            {!! Form::number('intVehiNetCapacity', null, ['id' => 'intVehiNetCapacity', 'class' => 'form-control', 'required min' => '1.00']) !!}
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          </div>
          <div class="form-group">
            {!! Form::label('intVehiGrossWeight', 'Gross Weight') !!}
            {!! Form::number('intVehiGrossWeight', null, ['id' => 'intVehiGrossWeight', 'class' => 'form-control', 'required min' => '1.00']) !!}
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          </div>
        {!! Form::close() !!}
      </div>
      <div class="modal-footer">
        <button class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
        <button id="btn-save" value="add" class="modal-btn btn btn-success pull-right">Submit</button>
        <input type="hidden" id="link_id" name="link_id" value="0">
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="edit_vehi" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal-header-info" id="vehi-modal-header">
        <h4 id="title">Edit Vehicle Record</h4>
      </div>
      <div class="modal-body">
        <form id="formEditVehi">
          <div class="form-group">
            {!! Form::label('intV_VehiType_ID', 'Vehicle Type') !!}
            <select name="intV_VehiType_ID" id="intV_VehiType_ID" class="form-control">
              @foreach($vehitypes as $vehitype)
                <option value="{{ $vehitype->intVehiTypeID }}">{{ $vehitype->strVehiTypeName }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            {!! Form::label('strVehiModel', 'Vehicle Model') !!}
            {!! Form::text('strVehiModel', null, ['id' => 'strVehiModel', 'class' => 'form-control']) !!}
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          </div>
          <div class="form-group">
            {!! Form::label('strVehiPlateNumber', 'Plate Number') !!}
            {!! Form::text('strVehiPlateNumber', null, ['id' => 'strVehiPlateNumber', 'class' => 'form-control']) !!}
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          </div>
          <div class="form-group">
            {!! Form::label('strVehiVIN', 'VIN') !!}
            {!! Form::text('strVehiVIN', null, ['id' => 'strVehiVIN', 'class' => 'form-control']) !!}
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          </div>
          <div class="form-group">
            {!! Form::label('intVehiNetCapacity', 'Net Capacity') !!}
            {!! Form::number('intVehiNetCapacity', null, ['id' => 'intVehiNetCapacity', 'class' => 'form-control', 'required min' => '1.00']) !!}
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          </div>
          <div class="form-group">
            {!! Form::label('intVehiGrossWeight', 'Gross Weight') !!}
            {!! Form::number('intVehiGrossWeight', null, ['id' => 'intVehiGrossWeight', 'class' => 'form-control', 'required min' => '1.00']) !!}
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
        <button id="btn-update" value="update" class="modal-btn btn btn-info pull-right">Update</button>
        <input type="hidden" id="link_id" name="link_id" value="0">
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="del_vehi">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal-header-danger" id="vehi-del-modal-header">
        <center><h4 id="title">Delete Vehicle Record</h4></center>
      </div>
      <div class="modal-body">
        <center>
          <h5>
            <b>
              You are about to delete this Vehicle data and all its contents. 
              <br>
              This action cannot be undone. Delete Vehicle Record?
            </b>
          </h5>
        </center>
      </div>
      <div class="modal-footer">
        <button class="btn btn-default pull-left" data-dismiss="modal">Cancel, Keep Data</button>
        <button id="btn-del-confirm" value="add" class="modal-btn btn btn-danger pull-right">Confirm, Delete Vehicle</button>
        <input type="hidden" id="link_id" name="link_id" value="0">
      </div>
    </div>
  </div>
</div>