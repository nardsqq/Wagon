<table id="dataTable" class="table table-bordered table-hover" style="visibility: hidden;" width="100%">
  <thead>
    <tr>
      <th>Type</th>
      <th>Model</th>
      <th>Plate Number</th>
      <th>VIN</th>
      <th class="text-center">Actions</th>
    </tr>
  </thead>
  <tbody id="prod-list">
    @foreach ($vehicles as $vehicle)
      <tr id="id{{ $vehicle->intVehiID }}">
        <td>{{ $vehicle->vehitypes->strVehiTypeName }}</td>
        <td>{{ $vehicle->strVehiModel }}</td>
        <td>{{ $vehicle->strVehiPlateNumber }}</td>
        <td>{{ $vehicle->strVehiVIN }}</td>
        <td class="text-center">
          <a href="{{ route('vehicle.show', $vehicle->intVehiID) }}" class="btn btn-sm btn-default"><i class='fa fa-circle-o'></i>&nbsp; View</a>
          <button class="btn btn-info btn-sm btn-detail open-modal" value="{{ $vehicle->intVehiID }}"><i class='fa fa-edit'></i>&nbsp; Edit</button>
          <button class="btn btn-danger btn-sm btn-delete" value="{{ $vehicle->intVehiID }}"><i class='fa fa-trash-o'></i>&nbsp; Delete</button>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
