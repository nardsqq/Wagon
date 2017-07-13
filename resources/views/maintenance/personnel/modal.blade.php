<div class="modal fade" id="add_personnel">
  <div class="modal-dialog pulse animated">
    <div class="modal-content">
      <div class="modal-header modal-header-success">
        <button class="close" data-dismiss="modal">&times;</button>
        <center><h4>Personnel Record</h4></center>
      </div>
      <div class="modal-body">
        <form id="formPersonnel" data-parsley-validate>
          <div class="form-group">
            <label>Department</label>
            <select id="intPersDeptID" class="form-control" name="intPersDeptID">
              @foreach($department as $departments)
                <option value={{$departments->intDepartmentID}}>{{$departments->strDepartmentName}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label>Position</label>
            <select id="intPersPosID" class="form-control" name="intPersPosID">
              @foreach($position as $positions)
                <option value={{$positions->intPositionID}}>{{$positions->strPositionName}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="strPersFName">First Name</label>
            <input type="text" id="strPersFName" name="strPersFName" class="form-control" data-parsley-pattern=/^[a-zA-Z0-9\-\s]+$/ maxlength="45" required>
            <input type="hidden" name="_token" value="{{csrf_token()}}">
          </div>
          <div class="form-group">
            <label for="strPersMName">Middle Name</label>
            <input type="text" id="strPersMName" name="strPersMName" class="form-control" data-parsley-pattern=/^[a-zA-Z0-9\-\s]+$/ maxlength="45">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
          </div>
          <div class="form-group">
            <label for="strPersLName">Last Name</label>
            <input type="text" id="strPersLName" name="strPersLName" class="form-control" data-parsley-pattern=/^[a-zA-Z0-9\-\s]+$/ maxlength="45" required>
            <input type="hidden" name="_token" value="{{csrf_token()}}">
          </div>
          <div class="form-group">
            <label for="strPersAddress">Address</label>
            <input type="text" id="strPersAddress" name="strPersAddress" class="form-control" maxlength="45" required>
            <input type="hidden" name="_token" value="{{csrf_token()}}">
          </div>
          <div class="form-group">
            <label>Contact Number</label>
            <input type="text" name="strPersContactNumber" id="strPersContactNumber" class="form-control" data-parsley-type="number" minlength="11" maxlength="11" required>
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