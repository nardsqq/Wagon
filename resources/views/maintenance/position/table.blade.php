<table id="dataTable" class="table table-bordered table-hover" style="visibility: hidden;" width="100%">
  <thead>
    <tr>
      <th>Position</th>
      <th>Description</th>
      <th class="text-center">Actions</th>
    </tr>
  </thead>
  <tbody id="position-list">
    @foreach ($positions as $position)
    <tr id="id{{ $position->int_position_id }}">
        <td>{{ $position->str_position_name }}</td>
        <td>{{ $position->txt_position_desc }}</td>
        <td class="text-center">
            <button class="btn btn-info btn-sm btn-detail open-modal" value="{{ $position->int_position_id }}"><i class='fa fa-edit'></i>&nbsp; Edit</button>
            <button class="btn btn-danger btn-sm btn-delete" value="{{ $position->int_position_id }}"><i class='fa fa-trash-o'></i>&nbsp; Delete</button>
        </td>
    </tr>
    @endforeach
  </tbody>
</table>
