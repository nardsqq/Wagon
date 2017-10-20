<div class="modal fade" id="add_mode" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header modal-header-success" id="mode-modal-header">
        <h4 id="title">Receive Items</h4>
      </div>
      <div class="modal-body">
        {!! Form::open(['url' => '/admin/maintenance/receive-items', 'method' => 'POST', 'id' => 'formReceive']) !!}
          <div class="row">
            <div class="col-xs-6">
              {!! Form::label('dtmAcquisition', 'Date') !!}
              {!! Form::date('dtmAcquisition', \Carbon\Carbon::now()->format('Y-m-d'), array('id' => 'dtmAcquisition', 'class' => 'form-control')); !!}
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </div>
            <div class="col-xs-6">
              {!! Form::label('strPONumber', 'PO Reference Number') !!}
              {!! Form::text('strPONumber', null, ['id' => 'strPONumber', 'class' => 'form-control']) !!}
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </div>
          </div>
          <div class="form-group m-t-10">
            {!! Form::label('intS_Supp_ID', 'Mode of Payment') !!}
            <select name="intS_Supp_ID" id="intS_Supp_ID" class="form-control">
              @foreach ($supps as $supp)
                <option value="{{ $supp->intSuppID }}">{{ $supp->strSuppName }}</option>
              @endforeach
            </select>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          </div>
          <div class="form-group">
            <select name="intS_Var_ID" id="intS_Var_ID" class="form-control">
              @foreach ($vars as $var)
                <option value="{{ $var->intVarID }}">{{ $var->strVarPartNum }} - {{ $var->strVarModel }}</option>
              @endforeach
            </select>
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

<!-- modal for new and update -->
  <div class="modal fade" id="modalMultipleChoice">
    <div class="modal-dialog modal-70">
      <div class="modal-content">
        <!-- modal header -->
        <div class="modal-header">
          <button class="close" data-dismiss="modal">&times;</button>
          <h3 id="modalTitle">XXX</h3>
        </div>
        <!-- modal body -->
        <div class="modal-body">
          <form id="formMultipleChoice" data-parsley-validate>
            <div class="form-group">
              <label>Question <span class="asterisk-red">*</span></label>
              <textarea id="inputQuestion" rows="3" class="form-control" required></textarea>
            </div>
          </form>
          <form id="formChoice" data-parsley-validate>
            <div class="form-group">
              <label>Choice <span class="asterisk-red">*</span></label>
              <input type="text" class="form-control" id="inputChoice" required><br>
              <label><input type="checkbox" name="cbCorrect" id="cbCorrect"> CORRECT</label>
              <div class="pull-right">
                <button class="btn btn-primary btn-block" id="btnChoiceAdd">ADD CHOICE</button>
              </div>
            </div><hr>
            <div class="form-group">
              <table id="tblChoice" class="table table-striped table-bordered">
                <thead>
                  <th>Choice</th>
                  <th style="text-align: center;">Answer</th>
                  <th style="text-align: center;">Action</th>
                </thead>
                <tbody id="variant-list"></tbody>
              </table>
            </div>
          </form>
        </div>
        <!-- modal footer -->
        <div class="modal-footer">
          <div class="form-group">
            <div class="modal-footer">
              <button class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
              <button id="btnSave" value="New" class="modal-btn btn btn-success pull-right">Submit</button>
              <input type="hidden" id="link_id" name="link_id" value="0">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<div class="modal fade" id="del_mode">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal-header-danger" id="mode-del-modal-header">
        <center><h4 id="title">Delete Mode Of Payment Record</h4></center>
      </div>
      <div class="modal-body">
        <center>
          <h5>
            <b>
              You are about to delete this Mode Of Payment data and all its contents. 
              <br>
              This action cannot be undone. Delete Mode Of Payment?
            </b>
          </h5>
        </center>
      </div>
      <div class="modal-footer">
        <button class="btn btn-default pull-left" data-dismiss="modal">Cancel, Keep Data</button>
        <button id="btn-del-confirm" value="add" class="modal-btn btn btn-danger pull-right">Confirm, Delete Mode Of Payment</button>
        <input type="hidden" id="link_id" name="link_id" value="0">
      </div>
    </div>
  </div>
</div>