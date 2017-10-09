<div class="modal fade" id="add_prod" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal-header-success" id="prod-modal-header">
        <h4 id="title">Add New Product</h4>
      </div>
      <div class="modal-body">
        {!! Form::open(['url' => '/admin/maintenance/product', 'method' => 'POST', 'id' => 'formProd']) !!}
          <div class="form-group">
            {!! Form::label('intP_ProdType_ID', 'Product Type') !!}
            <select name="intP_ProdType_ID" id="intP_ProdType_ID" class="form-control">
              @foreach ($prodtypes as $prodtype)
                <option value="{{$prodtype->intProdTypeID}}">{{ $prodtype->strProdTypeName }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            {!! Form::label('strProdName', 'Product Name') !!}
            {!! Form::text('strProdName', null, ['id' => 'strProdName', 'class' => 'form-control']) !!}
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          </div>
          <div class="form-group">
            {!! Form::label('txtProdDesc', 'Description') !!}
            {!! Form::textarea('txtProdDesc', null, ['id' => 'txtProdDesc', 'class' => 'form-control resize', 'rows' => '5']) !!}
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

<div class="modal fade" id="del_prod">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal-header-danger" id="prod-del-modal-header">
        <center><h4 id="title">Delete Product Record</h4></center>
      </div>
      <div class="modal-body">
        <center>
          <h5>
            <b>
              You are about to delete this Product data and all its contents. 
              <br>
              This action cannot be undone. Delete Product?
            </b>
          </h5>
        </center>
      </div>
      <div class="modal-footer">
        <button class="btn btn-default pull-left" data-dismiss="modal">Cancel, Keep Data</button>
        <button id="btn-del-confirm" value="add" class="modal-btn btn btn-danger pull-right">Confirm, Delete Product</button>
        <input type="hidden" id="link_id" name="link_id" value="0">
      </div>
    </div>
  </div>
</div>