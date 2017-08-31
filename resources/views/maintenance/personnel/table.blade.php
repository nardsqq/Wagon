<table id="dataTable" class="table table-bordered table-hover table-condensed" style="visibility: hidden;" width="100%">
  <thead>
    <tr>
      <th>Role</th>
      <th>Full Name</th>
      <th class="text-center">Actions</th>
    </tr>
  </thead>
  <tbody id="product-list">
    @foreach ($personnels as $personnel)
    <tr id="id{{$personnel->intPersID}}">
        <td>{{ $personnel->roles->strRoleName }}</td>
        <td>
          {{ $personnel->strPersLName }}, {{ $personnel->strPersFName }} {{ $personnel->strPersFName }}
        </td>
        <td class="text-center">
            <a href="{{ route('personnel.show', $item->intPersID) }}" class="btn btn-sm btn-default"><i class='fa fa-circle-o'></i>&nbsp; View</a>
            <a href="{{ route('personnel.edit', $item->intPersID) }}" class="btn btn-info btn-sm btn-detail"><i class='fa fa-edit'></i>&nbsp; Edit</a>
            <button class="btn btn-danger btn-sm btn-delete" value="{{ $personnel->intPersID }}"><i class='fa fa-trash-o'></i>&nbsp; Delete</button>
            <input type="hidden" id="link_id" name="link_id" value="0">
        </td>
    </tr>
    @endforeach
  </tbody>
</table>
