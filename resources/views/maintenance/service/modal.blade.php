<div class="modal fade" id="add_service">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" data-dismiss="modal">&times;</button>
        <h4>Add Service</h4>
      </div>
      <div class="modal-body">
        <form id="formService" data-parsley-validate>
          <div class="form-group">
            <label for="strServiceName">Service</label>
            <input type="text" id="strServiceName" name="strServiceName" class="form-control" data-parsley-pattern=/^[a-zA-Z0-9\-\s]+$/ maxlength="45" required>
            <input type="hidden" name="_token" value="{{csrf_token()}}">
          </div>
          <div class="form-group">
            <label>Service Category</label>
            <select id="intServiceCategory" class="form-control" name="intServiceCategory">
              @foreach($servicecategory as $servicecategories)
                <option value={{$servicecategories->intServiceCategID}}>{{$servicecategories->strServiceCategName}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="strDesc">Service Details</label>
            <input type="text" id="strDesc" name="strDesc" class="form-control" data-parsley-pattern=/^[a-zA-Z0-9\-\s]+$/ maxlength="25">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
          </div>
          <div class="form-group">
            <button id="btn-save" value="add" class="btn btn-success btn-block">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>