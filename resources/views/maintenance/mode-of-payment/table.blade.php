<table id="dataTable" class="table table-bordered table-hover" style="visibility: hidden;" width="100%">
  <thead>
    <tr>
      <th>Mode Of Payment</th>
      <th class="text-center">Actions</th>
    </tr>
  </thead>
  <tbody id="mode-list">
    @foreach ($modes as $mode)
    <tr id="id{{$mode->int_mode_pay_id}}">
        <td>{{ $mode->str_mode_pay_name }}</td>
        <td class="text-center">
            <button class="btn btn-info btn-sm btn-detail open-modal" value="{{ $mode->int_mode_pay_id }}"><i class='fa fa-edit'></i>&nbsp; Edit</button>
            <button class="btn btn-danger btn-sm btn-delete" value="{{ $mode->int_mode_pay_id }}"><i class='fa fa-trash-o'></i>&nbsp; Delete</button>
        </td>
    </tr>
    @endforeach
  </tbody>
</table>
