<table id="dataTable" class="table table-bordered table-hover" style="visibility: hidden;" width="100%">
  <thead>
    <tr>
      <th>Specification</th>
      <th>Unit of Measurement</th>
      <th class="text-center">Actions</th>
    </tr>
  </thead>
  <tbody id="specs-list">
    @foreach ($specs as $spec)
    <tr id="id{{$spec->int_specs_id}}">
        <td>{{ $spec->str_specs_name }}</td>
        <td>{{ $spec->str_specs_uom }}</td>
        <td class="text-center">
            <button class="btn btn-info btn-sm btn-detail open-modal" value="{{ $spec->int_specs_id }}"><i class='fa fa-edit'></i>&nbsp; Edit</button>
            <button class="btn btn-danger btn-sm btn-delete" value="{{ $spec->int_specs_id }}"><i class='fa fa-trash-o'></i>&nbsp; Delete</button>
        </td>
    </tr>
    @endforeach
  </tbody>
</table>
