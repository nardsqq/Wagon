<div class="modal fade" id="add_servarea" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal-header-success" id="servarea-modal-header">
        <h4 id="title">Add New Service Area</h4>
      </div>
      <div class="modal-body">
        <form id="formServArea">
          <div class="form-group">
            <label for="intSA_ServType_ID">Service Type</label>
              <select name="intSA_ServType_ID" id="intSA_ServType_ID" class="form-control">
                @foreach ($servtypes as $servtype)
                  <option value="{{$servtype->intServTypeID}}">{{ $servtype->strServTypeName }}</option>
                @endforeach
              </select>
          </div>
          <div class="form-group">
            <label for="strServAreaName">Service Area</label>
            <input type="text" id="strServAreaName" name="strServAreaName" class="form-control">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          </div>
          <div class="form-group">
            <label for="txtServAreaDesc">Description</label>
            <textarea class="form-control resize" rows="5" id="txtServAreaDesc" name="txtServAreaDesc"></textarea>
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