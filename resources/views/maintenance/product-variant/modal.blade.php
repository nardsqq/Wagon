<div class="modal fade" id="add_prodvar" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header modal-header-success" id="prodvar-modal-header">
        <h4 id="title">Add New Product Variant</h4>
      </div>
      <div class="modal-body">
        {!! Form::open(['url' => '/admin/maintenance/product-variant', 'method' => 'POST', 'id' => 'formProdVar']) !!}
          <div class="row m-t-10">
            <div class="col-xs-6">
              {!! Form::label('int_prod_id_fk', 'Product') !!}
              <input type="hidden" name="product_id" :value="product.int_product_id">
              <select name="int_prod_id_fk" id="int_prod_id_fk" class="form-control" v-model="product">
                  <option v-for="product in products" :key="product.int_product_id" :value="product">@{{ product.str_product_name }}</option>
              </select>
            </div>
            
            
            <div class="col-xs-3">
                {!! Form::label('quantity', 0, 'Quantity') !!}
                {{ Form::number('quantity', 0, ['class'=>'form-control'])}}
            </div>
            <div class="col-xs-3">
              {!! Form::label('price', 'Unit Price') !!}
              {{ Form::number('price', 0, ['class'=>'form-control'])}}
            </div>
          </div>
          <hr>
          <div class="form-group">
            <label>Product Specification</label>
          </div>
          <div  style="max-height: 300px; overflow-y: auto; overflow-x: hidden;">
            <div class="row m-t-10" v-for="specs in product.prod_attribs" :key="specs.int_prod_attrib_id">
                <div class="col-xs-3">
                  <input type="hidden" :value="specs.int_prod_attrib_id">
                  <label :for="'str_spec_constant['+specs.int_prod_attrib_id+']'">@{{ specs.attribute.str_attrib_name }}</label>
                </div>
                <div class="col-xs-9">
                  <input type="text" :name="'str_spec_constant['+specs.int_prod_attrib_id+']'" :id="'str_spec_constant['+specs.int_prod_attrib_id+']'" placeholder="Enter value" class="form-control" max-length="45">
                </div>
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

<div class="modal fade" id="edit_prodvar" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header modal-header-info" id="prodvar-modal-header">
        <h4 id="title">Edit Product Variant</h4>
      </div>
      <div class="modal-body">
        <form id="formEditVar" v-if="isFormEdit">
          <div class="row m-t-10">
            <div class="col-xs-6">
              {!! Form::label('int_prod_id_fk', 'Product') !!}
              {{--  <input type="hidden" name="product_id" :value="product.int_product_id">  --}}
              {{--  <select name="int_prod_id_fk" id="int_prod_id_fk" class="form-control" v-model="product">
                  <option v-for="product in products" :key="product.int_product_id" :value="product">@{{ product.str_product_name }}</option>
              </select>  --}}
              <input type="text" class="form-control" max-length="45" :value="product.str_product_name" disabled>
            </div>
            
            <div class="col-xs-3">
                {!! Form::label('quantity', 0, 'Quantity') !!}
                <input type="number" class="form-control" :value="variant.stock" readonly>
            </div>
            <div class="col-xs-3">
              {!! Form::label('price', 'Unit Price') !!}
              <input name="price" type="number" class="form-control" :value="variant.price">
            </div>
          </div>
          <hr>
          <div class="form-group">
            <label>Product Specification</label>
          </div>
          <div  style="max-height: 300px; overflow-y: auto; overflow-x: hidden;">
            <div class="row m-t-10" v-for="spec in specs" :key="specs.int_prod_attrib_id">
                <div class="col-xs-3">
                  <input type="hidden" :value="spec.int_prod_attrib_id">
                  <label :for="'str_spec_constant['+spec.int_prod_attrib_id+']'">@{{ spec.str_attrib_name }}</label>
                </div>
                <div class="col-xs-9">
                  <input type="text" :name="'str_spec_constant['+spec.int_prod_attrib_id+']'" :id="'str_spec_constant['+spec.int_prod_attrib_id+']'" placeholder="Enter value" class="form-control" max-length="45" :value="spec.str_spec_constant">
                </div>
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

<div class="modal fade" id="del_prodvar">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal-header-danger" id="prodvar-del-modal-header">
        <center><h4 id="title">Delete Product Variant Record</h4></center>
      </div>
      <div class="modal-body">
        <center>
          <h5>
            <b>
              You are about to delete this Product Variant record and all its contents. 
              <br>
              This action cannot be undone. Delete Product Variant?
            </b>
          </h5>
        </center>
      </div>
      <div class="modal-footer">
        <button class="btn btn-default pull-left" data-dismiss="modal">Cancel, Keep Record</button>
        <button id="btn-del-confirm" value="add" class="modal-btn btn btn-danger pull-right">Confirm, Delete Product Variant</button>
        <input type="hidden" id="link_id" name="link_id" value="0">
      </div>
    </div>
  </div>
</div>