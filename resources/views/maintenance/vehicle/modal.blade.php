<div class="modal fade" id="add_vehicle">
  <div class="modal-dialog pulse animated">
    <div class="modal-content">
      <div class="modal-header modal-header-success">
        <button class="close" data-dismiss="modal">&times;</button>
        <center><h4>Add Vehicle</h4></center>
      </div>
      <div class="modal-body">
        <form id="formVehicle" data-parsley-validate>
          <div class="form-group">
            <label>Vehicle Type</label>
            <select id="intVehicleTypeNum" class="form-control" name="intVehicleTypeNum">
              @foreach($vehicletype as $vehicletypes)
                <option value={{$vehicletypes->intVehicleTypeNumber}}>{{$vehicletypes->strVehicleTypeName}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="strVehicleModel">Vehicle Model</label>
            <input type="text" id="strVehicleModel" name="strVehicleModel" class="form-control" data-parsley-pattern=/^[a-zA-Z0-9\-\s]+$/ maxlength="45">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
          </div>
          <div class="form-group">
            <label for="strVehiclePlateNumber">Plate Number</label>
            <input type="text" id="strVehiclePlateNumber" name="strVehiclePlateNumber" class="form-control" data-parsley-pattern=/^[a-zA-Z0-9\-\s]+$/ maxlength="8" required>
            <input type="hidden" name="_token" value="{{csrf_token()}}">
          </div>
          <div class="form-group">
            <label for="intVehicleNetCapacity">Net Capacity</label>
            <input type="text" id="intVehicleNetCapacity" name="intVehicleNetCapacity" class="form-control" data-parsley-type="number" maxlength="25">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
          </div> 
          <div class="form-group">
            <label for="intVehicleGrossWeight">Gross Weight</label>
            <input type="text" id="intVehicleGrossWeight" name="intVehicleGrossWeight" class="form-control" data-parsley-type="number" maxlength="25">
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