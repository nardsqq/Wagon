<div class="modal fade" id="add_rec" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header modal-header-success" id="rec-modal-header">
        <h4 id="title">Receive Items</h4>
      </div>
      <div class="modal-body">
        {!! Form::open(['url' => '/admin/transactions/receive-items', 'method' => 'POST', 'id' => 'formReceive']) !!}
          <div class="row">
            <div class="col-xs-6">
              {!! Form::label('strPONumber', 'PO Reference Number') !!}
              {!! Form::text('strPONumber', null, ['id' => 'strPONumber', 'class' => 'form-control']) !!}
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </div>
            <div class="col-xs-6">
              {!! Form::label('dtmAcquisition', 'Date') !!}
              {!! Form::date('dtmAcquisition', \Carbon\Carbon::now()->format('Y-m-d'), array('id' => 'dtmAcquisition', 'class' => 'form-control')); !!}
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </div>
          </div>
          <div class="form-group m-t-10">
            {!! Form::label('intS_Supp_ID', 'Supplier') !!}
            <select name="intS_Supp_ID" id="intS_Supp_ID" class="form-control">
              <option value="#">Supplier Name</option>
            </select>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          </div>
          <hr>
          <div class="form-group">
            Valerie Part
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