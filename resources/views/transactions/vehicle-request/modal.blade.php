<div class="modal fade" id="add_vehireq" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal-header-success" id="vehicle-request-modal-header">
        <h4 id="title">Add New Vehicle Request</h4>
      </div>
      <div class="modal-body">
        {!! Form::open(['url' => '/admin/transactions/vehicle-request', 'method' => 'POST', 'id' => 'formVehiReq']) !!}
          <div class="form-group">
            {!! Form::label('intVR_Pers_ID', 'Requesting Personnel') !!}
            <select name="intVR_Pers_ID" id="intVR_Pers_ID" class="form-control">
              <option value="tyron">Tyron delos Reyes</option>
              <option value="xandra ">Xandra Faye Subiera</option>
            </select>
          </div>
          <div class="form-group">
            {!! Form::label('strVehiReqLocation', 'Location') !!}
            {!! Form::text('strVehiReqLocation', null, ['id' => 'strVehiReqLocation', 'class' => 'form-control']) !!}
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          </div>
          <div class="form-group">
            {!! Form::label('datDeparture', 'Date of Departure') !!}
            {!! Form::date('datDeparture', null, ['id' => 'datDeparture', 'class' => 'form-control']) !!}
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          </div>
          <div class="form-group">
            {!! Form::label('datEstReturn', 'Estimated Date of Return') !!}
            {!! Form::date('datEstReturn', null, ['id' => 'datEstReturn', 'class' => 'form-control']) !!}
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          </div>
          <div class="form-group">
            {!! Form::label('txtVehiReqPurpose', 'Purpose of Request') !!}
            {!! Form::textarea('txtVehiReqPurpose', null, ['id' => 'txtVehiReqPurpose', 'class' => 'form-control', 'rows' => '5']) !!}
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

<div class="modal fade" id="del_vehireq">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal-header-danger" id="vehicle-request-del-modal-header">
        <center><h4 id="title">Delete Vehicle Request</h4></center>
      </div>
      <div class="modal-body">
        <center>
          <h5>
            <b>
              You are about to delete this record and all its contents. 
              <br>
              This action cannot be undone. Delete Vehicle Request?
            </b>
          </h5>
        </center>
      </div>
      <div class="modal-footer">
        <button class="btn btn-default pull-left" data-dismiss="modal">Cancel, Keep Data</button>
        <button id="btn-del-confirm" value="add" class="modal-btn btn btn-danger pull-right">Confirm, Delete Vehicle Request</button>
        <input type="hidden" id="link_id" name="link_id" value="0">
      </div>
    </div>
  </div>
</div>