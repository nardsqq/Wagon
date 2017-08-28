<table id="dataTable" class="table table-bordered table-hover" style="visibility: hidden;" width="100%">
  <thead>
    <tr>
      <th>Type</th>
      <th>Service Area</th>
      <th>Description</th>
      <th class="text-center">Actions</th>
    </tr>
  </thead>
  <tbody id="service-area-list">
    @foreach ($servareas as $servarea)
    <tr id="id{{ $servarea->intServAreaID }}">
        <td>{{ $servarea->servtypes->strServTypeName }}</td>
        <td>{{ $servarea->strServAreaName }}</td>
        <td>{{ $servarea->txtServAreaDesc }}</td>
        <td class="text-center">
            <button class="btn btn-info btn-sm btn-detail open-modal" value="{{ $servarea->intServAreaID }}"><i class='fa fa-edit'></i>&nbsp; Edit</button>
            <button class="btn btn-danger btn-sm btn-delete" value="{{ $servarea->intServAreaID }}"><i class='fa fa-trash-o'></i>&nbsp; Delete</button>
        </td>
    </tr>
    @endforeach
  </tbody>
</table>
