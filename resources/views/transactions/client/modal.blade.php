<div class="modal fade" id="add_client" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header modal-header-success" id="client-modal-header">
        <h4 id="title">Add New Personnel Record</h4>
      </div>
      <div class="modal-body">
        {!! Form::open(['url' => '/admin/transactions/client', 'method' => 'POST', 'id' => 'formClient']) !!}
          <div class="row">
            <div class="col-xs-6">
              {!! Form::label('str_client_name', 'Client Name') !!}
              {!! Form::text('str_client_name', null, ['id' => 'str_client_name', 'class' => 'form-control']) !!}
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </div>
            <div class="col-xs-6">
              {!! Form::label('str_client_person', 'Client Representative') !!}
              {!! Form::text('str_client_person', null, ['id' => 'str_client_person', 'class' => 'form-control']) !!}
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </div>
          </div>
          <div class="row m-t-10">
            <div class="col-xs-12">
              {!! Form::label('txt_client_address', 'Address') !!}
              {!! Form::textarea('txt_client_address', null, ['id' => 'txt_client_address', 'class' => 'form-control', 'rows' => 7]) !!}
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </div>
          </div>
          <div class="row m-t-10">
            <div class="col-xs-6">
              {!! Form::label('str_client_landmark', 'Landmark') !!}
              {!! Form::text('str_client_landmark', null, ['id' => 'str_client_landmark', 'class' => 'form-control']) !!}
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </div>
            <div class="col-xs-6">
              {!! Form::label('str_client_tin', 'Taxpayer Identification Number') !!}
              {!! Form::text('str_client_tin', null, ['id' => 'str_client_tin', 'class' => 'form-control']) !!}
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </div>
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

<div class="modal fade" id="edit_client" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header modal-header-info" id="client-modal-header-info">
        <h4 id="title">Edit Client Record</h4>
      </div>
      <div class="modal-body">
        <form id="formEditClient">
          <div class="row">
            <div class="col-xs-6">
              {!! Form::label('str_client_name', 'Client Name') !!}
              {!! Form::text('str_client_name', null, ['id' => 'str_client_name', 'class' => 'form-control']) !!}
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </div>
            <div class="col-xs-6">
              {!! Form::label('str_client_person', 'Client Representative') !!}
              {!! Form::text('str_client_person', null, ['id' => 'str_client_person', 'class' => 'form-control']) !!}
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </div>
          </div>
          <div class="row m-t-10">
            <div class="col-xs-12">
              {!! Form::label('txt_client_address', 'Address') !!}
              {!! Form::textarea('txt_client_address', null, ['id' => 'txt_client_address', 'class' => 'form-control', 'rows' => 7]) !!}
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </div>
          </div>
          <div class="row m-t-10">
            <div class="col-xs-6">
              {!! Form::label('str_client_landmark', 'Landmark') !!}
              {!! Form::text('str_client_landmark', null, ['id' => 'str_client_landmark', 'class' => 'form-control']) !!}
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </div>
            <div class="col-xs-6">
              {!! Form::label('ed_str_client_tin', 'Taxpayer Identification Number') !!}
              {!! Form::text('ed_str_client_tin', null, ['id' => 'ed_str_client_tin', 'class' => 'form-control']) !!}
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </div>
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

<div class="modal fade" id="del_client">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal-header-danger" id="client-del-modal-header">
        <center><h4 id="title">Delete Client Record</h4></center>
      </div>
      <div class="modal-body">
        <center>
          <h5>
            <b>
              You are about to delete this Client data and all its contents. 
              <br>
              This action cannot be undone. Delete Client Record?
            </b>
          </h5>
        </center>
      </div>
      <div class="modal-footer">
        <button class="btn btn-default pull-left" data-dismiss="modal">Cancel, Keep Data</button>
        <button id="btn-del-confirm" value="add" class="modal-btn btn btn-danger pull-right">Confirm, Delete Client Record</button>
        <input type="hidden" id="link_id" name="link_id" value="0">
      </div>
    </div>
  </div>
</div>