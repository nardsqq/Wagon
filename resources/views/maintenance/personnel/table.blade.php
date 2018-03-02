<table id="dataTable" class="table table-bordered table-hover" style="visibility: hidden;" width="100%">
  <thead>
    <tr>
      <th>Type</th>
      <th>Full Name</th>
      <th>Mobile Number</th>
      <th class="text-center">Actions</th>
    </tr>
  </thead>
  <tbody id="prod-list">
    @foreach ($personnels as $personnel)
      <tr id="id{{ $personnel->int_personnel_id }}">
        <td>{{ $personnel->str_personnel_type }}</td>
        <td>{{ $personnel->str_personnel_l_name }}, {{ $personnel->str_personnel_f_name }} {{ $personnel->str_personnel_m_name }}</td>
        <td>{{ $personnel->str_personnel_mobile_num }}</td>
        <td class="text-center">
            <button class="btn btn-info btn-sm btn-detail open-modal" value="{{ $personnel->int_personnel_id }}"><i class='fa fa-edit'></i>&nbsp; 
              Edit
            </button>
            <button class="btn btn-danger btn-sm btn-delete" value="{{ $personnel->int_personnel_id }}"><i class='fa fa-trash-o'></i>&nbsp; Delete</button>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
