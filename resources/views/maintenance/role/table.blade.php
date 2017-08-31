<table id="dataTable" class="table table-bordered table-hover table-condensed" style="visibility: hidden;" width="100%">
  <thead>
    <tr>
      <th>Role</th>
      <th>Description</th>
      <th class="text-center">Actions</th>
    </tr>
  </thead>
  <tbody id="product-list">
    @foreach ($roles as $role)
    <tr id="id{{$role->intRoleID}}">
        <td>{{ $role->strRoleName }}</td>
        <td>{{ $role->txtRoleDesc }}</td>
        <td class="text-center">
            <a href="{{ route('role.show', $role->intRoleID) }}" class="btn btn-sm btn-default"><i class='fa fa-circle-o'></i>&nbsp; View</a>
            <a href="{{ route('role.edit', $role->intRoleID) }}" class="btn btn-info btn-sm btn-detail"><i class='fa fa-edit'></i>&nbsp; Edit</a>
            <button class="btn btn-danger btn-sm btn-delete" value="{{ $role->intRoleID }}"><i class='fa fa-trash-o'></i>&nbsp; Delete</button>
        </td>
    </tr>
    @endforeach
  </tbody>
</table>
