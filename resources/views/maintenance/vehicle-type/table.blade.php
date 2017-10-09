
<table id="dataTable" class="table table-bordered table-hover" style="visibility: hidden;" width="100%">
  <thead>
    <tr>
      <th>Vehicle Type</th>
      <th>Description</th>
      <th class="text-center">Actions</th>
    </tr>
  </thead>
  <tbody id="vehicle-type-list">
    @foreach ($vehitypes as $vehitype)
    <tr id="id{{ $vehitype->intVehiTypeID }}">
        <td>{{ $vehitype->strVehiTypeName }}</td>
        <td>{{ $vehitype->txtVehiTypeDesc }}</td>
        <td class="text-center">
            <button class="btn btn-info btn-sm btn-detail open-modal" value="{{ $vehitype->intVehiTypeID }}"><i class='fa fa-edit'></i>&nbsp; Edit</button>
            <button class="btn btn-danger btn-sm btn-delete" value="{{ $vehitype->intVehiTypeID }}"><i class='fa fa-trash-o'></i>&nbsp; Delete</button>
        </td>
    </tr>
    @endforeach
  </tbody>
</table>
