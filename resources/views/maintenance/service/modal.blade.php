<div class="modal fade" id="add_service" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal-header-success" id="service-modal-header">
        <h4 id="title">Add New Service</h4>
      </div>
      <div class="modal-body">
        <form id="formService">
          <div class="form-group">
            <label for="str_service_name">Service</label>
            <input type="text" id="str_service_name" name="str_service_name" class="form-control">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          </div>

          <div class="form-group">
            <label>Description</label>
            <button id="btn-add-step" @click="addDesc" type="button" class="btn btn-sm btn-success pull-right">Add Description</button>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" v-model="description.str_service_desc_detail" placeholder="Add New Description" @keyup.enter="addDesc">
          </div>
          {{-- <div id="step-list"></div> --}}

          <div class="form-group">
            <table class="table table-hover table-bordered">
              <tbody id="step-list">
                <tr v-for="(desc, index) in descriptions" :key="desc">
                  <td><input :name="'description['+ (desc.int_service_desc_id ? desc.int_service_desc_id : 0 - index) +']'" type="text" class="form-control" v-model="desc.str_service_desc_detail"></td>
                  
                  <td class="text-center">
                    <button type="button" @click.prevent="removeDesc(index)" class="btn btn-xs btn-danger">Remove</button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>

          <div class="form-group">
            <label for="int_material_id">Materials</label>
            {!! Form::select('int_material_id[]', [], null, ['id' => 'int_material_id', 'class' => 'form-control']) !!}
          </div>

          <hr>

          <div class="form-group">
            <label for="dbl_service_price">Service Fee</label>
            <input type="number" class="form-control" name="dbl_service_price">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          </div>

        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
        <button id="btn-save" value="add" class="modal-btn btn btn-success pull-right">Submit</button>
        <input type="hidden" id="link_id" name="link_id" value="0">
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="del_service">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal-header-danger" id="service-del-modal-header">
        <center><h4 id="title">Delete Service Record</h4></center>
      </div>
      <div class="modal-body">
        <center>
          <h5>
            <b>
              You are about to delete this Service data and all its contents. 
              <br>
              This action cannot be undone. Delete Service?
            </b>
          </h5>
        </center>
      </div>
      <div class="modal-footer">
        <button class="btn btn-default pull-left" data-dismiss="modal">Cancel, Keep Data</button>
        <button id="btn-del-confirm" value="add" class="modal-btn btn btn-danger pull-right">Confirm, Delete Service</button>
        <input type="hidden" id="link_id" name="link_id" value="0">
      </div>
    </div>
  </div>
</div>