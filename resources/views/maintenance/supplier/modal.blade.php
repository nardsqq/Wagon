<div class="modal fade" id="add_supp" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal-header-success" id="supp-modal-header">
        <h4 id="title">Add New Supplier Record</h4>
      </div>
      <div class="modal-body">
        {!! Form::open(['url' => '/admin/maintenance/supplier', 'method' => 'POST', 'id' => 'formSupp']) !!}
          <div class="form-group">
            {!! Form::label('str_supplier_name', 'Supplier Name') !!}
            {!! Form::text('str_supplier_name', null, ['id' => 'str_supplier_name', 'class' => 'form-control']) !!}
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          </div>
          <div class="row">
            <div class="col-xs-6">
              {!! Form::label('str_supplier_mobile_num', 'Contact Number') !!}
              {!! Form::text('str_supplier_mobile_num', null, ['id' => 'str_supplier_mobile_num', 'class' => 'form-control']) !!}
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </div>
            <div class="col-xs-6">
              {!! Form::label('str_supplier_tel_num', 'Telephone Number') !!}
              {!! Form::text('str_supplier_tel_num', null, ['id' => 'str_supplier_tel_num', 'class' => 'form-control']) !!}
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </div>
          </div>
          <div class="form-group m-t-10">
            {!! Form::label('str_supplier_email', 'E-mail Address') !!}
            {!! Form::email('str_supplier_email', null, ['id' => 'str_supplier_email', 'class' => 'form-control']) !!}
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          </div>
          <div class="form-group m-t-10">
            {!! Form::label('txt_supplier_address', 'Address') !!}
            {!! Form::textarea('txt_supplier_address', null, ['id' => 'txt_supplier_address', 'class' => 'form-control resize', 'rows' => '5']) !!}
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

<div class="modal fade" id="edit_supp" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header modal-header-info" id="supp-modal-header-info">
        <h4 id="title">Edit Supplier Record</h4>
      </div>
      <div class="modal-body">
        <form id="formEditSupp">
          <div class="form-group">
            {!! Form::label('str_supplier_name', 'Supplier Name') !!}
            {!! Form::text('str_supplier_name', null, ['id' => 'str_supplier_name', 'class' => 'form-control']) !!}
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          </div>
          <div class="row">
            <div class="col-xs-6">
              {!! Form::label('str_supplier_mobile_num', 'Contact Number') !!}
              {!! Form::text('ed_str_supplier_mobile_num', null, ['id' => 'ed_str_supplier_mobile_num', 'class' => 'form-control']) !!}
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </div>
            <div class="col-xs-6">
              {!! Form::label('str_supplier_tel_num', 'Telephone Number') !!}
              {!! Form::text('ed_str_supplier_tel_num', null, ['id' => 'ed_str_supplier_tel_num', 'class' => 'form-control']) !!}
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </div>
          </div>
          <div class="form-group m-t-10">
            {!! Form::label('str_supplier_email', 'E-mail Address') !!}
            {!! Form::email('str_supplier_email', null, ['id' => 'str_supplier_email', 'class' => 'form-control']) !!}
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          </div>
          <div class="form-group m-t-10">
            {!! Form::label('txt_supplier_address', 'Address') !!}
            {!! Form::textarea('txt_supplier_address', null, ['id' => 'txt_supplier_address', 'class' => 'form-control resize', 'rows' => '5']) !!}
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

<div class="modal fade" id="del_supp">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal-header-danger" id="supp-del-modal-header">
        <center><h4 id="title">Delete Supplier Record</h4></center>
      </div>
      <div class="modal-body">
        <center>
          <h5>
            <b>
              You are about to delete this Supplier data and all its contents. 
              <br>
              This action cannot be undone. Delete Supplier Record?
            </b>
          </h5>
        </center>
      </div>
      <div class="modal-footer">
        <button class="btn btn-default pull-left" data-dismiss="modal">Cancel, Keep Record</button>
        <button id="btn-del-confirm" value="add" class="modal-btn btn btn-danger pull-right">Confirm, Delete Supplier Record</button>
        <input type="hidden" id="link_id" name="link_id" value="0">
      </div>
    </div>
  </div>
</div>