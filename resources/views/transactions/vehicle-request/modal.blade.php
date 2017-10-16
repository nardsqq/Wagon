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
              @foreach($personnels as $personnel)
                <option value="{{ $personnel->intPersID }}">{{ $personnel->strPersFName }} {{ $personnel->strPersMName }} {{ $personnel->strPersLName }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            {!! Form::label('strVehiReqLocation', 'Location') !!}
            {!! Form::text('strVehiReqLocation', null, ['id' => 'strVehiReqLocation', 'class' => 'form-control']) !!}
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          </div>
          <div class="form-group">
            {!! Form::label('datDeparture', 'Date of Departure') !!}
            {!!Form::date('datDeparture', ( isset($vehireq->datDeparture) ? $vehireq->datDeparture : \Carbon\Carbon::now()->format('Y-m-d') ), array(
              'class'=>'form-control',
              'id' => 'datDeparture', 'min'=> \Carbon\Carbon::now()->format('Y-m-d'),
              'name' => 'datDeparture',
              'placeholder' => 'mm/dd/yyyy'
              )); 
            !!}
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          </div>
          <div class="form-group">
            {!! Form::label('datEstReturn', 'Estimated Date of Return') !!}
              {!!Form::date('datEstReturn', ( isset($vehireq->datEstReturn) ? $vehireq->datEstReturn : \Carbon\Carbon::now()->format('Y-m-d') ), array(
              'class'=>'form-control',
              'id' => 'datEstReturn', 'min'=> \Carbon\Carbon::now()->format('Y-m-d'),
              'name' => 'datEstReturn',
              'placeholder' => 'mm/dd/yyyy'
              )); 
            !!}
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

<div class="modal fade" id="edit_vehireq" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal-header-info" id="vehireq-modal-header-info">
        <h4 id="title">Edit Vehicle Request</h4>
      </div>
      <div class="modal-body">
        <form id="formEditVehiReq">
          <div class="form-group">
            {!! Form::label('intVR_Pers_ID', 'Requesting Personnel') !!}
            <select name="intVR_Pers_ID" id="intVR_Pers_ID" class="form-control">
              @foreach($personnels as $personnel)
                <option value="{{ $personnel->intPersID }}">{{ $personnel->strPersFName }} {{ $personnel->strPersMName }} {{ $personnel->strPersLName }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            {!! Form::label('strVehiReqLocation', 'Location') !!}
            {!! Form::text('strVehiReqLocation', null, ['id' => 'strVehiReqLocation', 'class' => 'form-control']) !!}
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          </div>
          <div class="form-group">
            {!! Form::label('datDeparture', 'Date of Departure') !!}
            {!!Form::date('datDeparture', ( isset($vehireq->datDeparture) ? $vehireq->datDeparture : \Carbon\Carbon::now()->format('Y-m-d') ), array(
              'class'=>'form-control',
              'id' => 'datDeparture', 'min'=> \Carbon\Carbon::now()->format('Y-m-d'),
              'name' => 'datDeparture',
              'placeholder' => 'mm/dd/yyyy'
              )); 
            !!}
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          </div>
          <div class="form-group">
            {!! Form::label('datEstReturn', 'Estimated Date of Return') !!}
              {!!Form::date('datEstReturn', ( isset($vehireq->datEstReturn) ? $vehireq->datEstReturn : \Carbon\Carbon::now()->format('Y-m-d') ), array(
              'class'=>'form-control',
              'id' => 'datEstReturn', 'min'=> \Carbon\Carbon::now()->format('Y-m-d'),
              'name' => 'datEstReturn',
              'placeholder' => 'mm/dd/yyyy'
              )); 
            !!}
          </div>
          <div class="form-group">
            {!! Form::label('txtVehiReqPurpose', 'Purpose of Request') !!}
            {!! Form::textarea('txtVehiReqPurpose', null, ['id' => 'txtVehiReqPurpose', 'class' => 'form-control', 'rows' => '5']) !!}
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