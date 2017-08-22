<table id="dataTable" class="table table-bordered table-hover" style="visibility: hidden;" width="100%">
  <thead>
    <tr>
      <th>Service Type</th>
      <th>Description</th>
      <th class="text-center">Actions</th>
    </tr>
  </thead>
  <tbody id="service-type-list">
    @foreach ($servtypes as $servtype)
    <tr id="id{{ $servtype->intServTypeID }}">
        <td>{{ $servtype->strServTypeName }}</td>
        <td>{{ $servtype->txtServTypeDesc }}</td>
        <td class="text-center">
            <button class="btn btn-info btn-sm btn-detail open-modal" value="{{ $servtype->intServTypeID }}"><i class='fa fa-edit'></i>&nbsp; Edit</button>
            <button class="btn btn-danger btn-sm btn-delete" value="{{ $servtype->intServTypeID }}"><i class='fa fa-trash-o'></i>&nbsp; Delete</button>
        </td>
    </tr>
    @endforeach
  </tbody>
</table>
