<table id="dataTable" class="table table-bordered table-hover">
  <thead>
    <tr>
      <th>Vehicle Type</th>
      <th>Description</th>
      <th class="text-center">Status</th>
      <th class="text-center">Actions</th>
    </tr>
  </thead>
  <tbody id="vehicletype-list">
    @foreach ($vehicletype as $vehicletypes)
    <tr id=id"{{$vehicletypes->intVehicleTypeNumber}}">
      <td>{{ $vehicletypes->strVehicleTypeName }}</td>
      <td>{{ $vehicletypes->strDesc }}</td>
      <td class="text-center">
        <input type="checkbox" id="isActive" name="isActive" value="{{$vehicletypes->intVehicleTypeNumber}}" 
          @if (($vehicletypes->isActive)==1){{"checked"}}
          @endif data-toggle="toggle" data-style="android" data-onstyle="success" data-offstyle="default" data-on="Active" data-off="<i class='fa fa-thumbs-o-down'></i> Inactive" data-size="mini"></td>
      <td class="text-center">
          <button class="btn btn-warning btn-sm btn-detail open-modal" value="{{$vehicletypes->intVehicleTypeNumber}}"><i class='fa fa-edit'></i>&nbsp; Edit</button>
          <button class="btn btn-danger btn-sm btn-delete" value="{{$vehicletypes->intVehicleTypeNumber}}"><i class='fa fa-trash-o'></i>&nbsp; Delete</button>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
