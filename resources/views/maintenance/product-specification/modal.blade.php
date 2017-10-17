<div class="modal fade" id="add_spec" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal-header-success" id="spec-modal-header">
        <h4 id="title">Set Product Specification</h4>
      </div>
      <div class="modal-body">
        <form id="formSpec">
          <div class="form-group">
            <label for="intD_Var_ID">Product Variant</label>
            <select name="intD_Var_ID" id="intD_Var_ID" class="form-control">
              @foreach ($servtypes as $servtype)
                <option value="{{$servtype->intServTypeID}}">{{ $servtype->strServTypeName }}</option>
              @endforeach
            </select>
          </div>

          <!-- STEPS -->
          
          <div class="form-group">
            <label>Steps</label>
            <button id="btn-add-step" onclick="addStep()" type="button" class="btn btn-sm btn-success pull-right">New Step</button>
          </div>
          <div id="step-list"></div>

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

<div class="modal fade" id="del_servarea">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal-header-danger" id="servarea-del-modal-header">
        <center><h4 id="title">Delete Service Area Record</h4></center>
      </div>
      <div class="modal-body">
        <center>
          <h5>
            <b>
              You are about to delete this Service Area data and all its contents. 
              <br>
              This action cannot be undone. Delete Service Area?
            </b>
          </h5>
        </center>
      </div>
      <div class="modal-footer">
        <button class="btn btn-default pull-left" data-dismiss="modal">Cancel, Keep Data</button>
        <button id="btn-del-confirm" value="add" class="modal-btn btn btn-danger pull-right">Confirm, Delete Service Area</button>
        <input type="hidden" id="link_id" name="link_id" value="0">
      </div>
    </div>
  </div>
</div>