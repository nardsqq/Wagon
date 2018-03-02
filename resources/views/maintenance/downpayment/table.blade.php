<table id="dataTable" class="table table-bordered table-hover" style="visibility: hidden;" width="100%">
  <thead>
    <tr>
      <th>Downpayment Name</th>
      <th>Value</th>
      <th class="text-center">Actions</th>
    </tr>
  </thead>
  <tbody id="down-list">
    @foreach ($downs as $down)
    <tr id="id{{$down->int_down_id}}">
        <td>{{ $down->str_down_name }}</td>
        <td>{{ $down->dbl_down_percentage }} %</td>
        <td class="text-center">
            <button class="btn btn-info btn-sm btn-detail open-modal" value="{{ $down->int_down_id }}"><i class='fa fa-edit'></i>&nbsp; Edit</button>
            <button class="btn btn-danger btn-sm btn-delete" value="{{ $down->int_down_id }}"><i class='fa fa-trash-o'></i>&nbsp; Delete</button>
        </td>
    </tr>
    @endforeach
  </tbody>
</table>
