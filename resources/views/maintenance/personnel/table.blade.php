<table id="dataTable" class="table table-bordered table-hover" style="visibility: hidden;" width="100%">
  <thead>
    <tr>
      <th>Role</th>
      <th>Regulation</th>
      <th>Full Name</th>
      <th>Mobile Number</th>
      <th class="text-center">Actions</th>
    </tr>
  </thead>
  <tbody id="prod-list">
    {{-- @foreach ($personnels as $personnel)
      <tr id="id{{ $personnel->intPersID }}">
        <td>{{ $personnel->roles->strRoleName }}</td>
        <td>{{ $personnel->strPersEmpType }}</td>
        <td>{{ $personnel->strPersLName }}, {{ $personnel->strPersFName }} {{ $personnel->strPersMName }}</td>
        <td>{{ $personnel->strPersMobNo }}</td>
        <td class="text-center">
            <button class="btn btn-info btn-sm btn-detail open-modal" value="{{ $personnel->intPersID }}"><i class='fa fa-edit'></i>&nbsp; Edit</button>
            <button class="btn btn-danger btn-sm btn-delete" value="{{ $personnel->intPersID }}"><i class='fa fa-trash-o'></i>&nbsp; Delete</button>
        </td>
      </tr>
    @endforeach --}}
  </tbody>
</table>
