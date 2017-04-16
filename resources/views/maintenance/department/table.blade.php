<table id="dataTable" class="table table-bordered table-hover">
  <thead>
    <tr>
      <th>Department</th>
      <th>Description</th>
      <th class="text-center">Status</th>
      <th class="text-center">Actions</th>
    </tr>
  </thead>
  <tbody id="department-list">
    @foreach ($department as $departments)
    <tr id=id"{{$departments->intDepartmentID}}">
      <td>{{ $departments->strDepartmentName }}</td>
      <td>{{ $departments->strDesc }}</td>
      <td class="text-center">
        <input type="checkbox" id="isActive" name="isActive" value="{{$departments->intDepartmentID}}" 
          @if (($departments->isActive)==1){{"checked"}}
          @endif data-toggle="toggle" data-style="android" data-onstyle="success" data-offstyle="default" data-on="<i class='fa fa-thumbs-o-up'></i> Active" data-off="<i class='fa fa-thumbs-o-down'></i> Inactive" data-size="mini"></td>
      <td class="text-center">
          <button class="btn btn-warning btn-sm btn-detail open-modal" value="{{$departments->intDepartmentID}}"><i class='fa fa-edit'></i>&nbsp; Edit</button>
          <button class="btn btn-danger btn-sm btn-delete" value="{{$departments->intDepartmentID}}"><i class='fa fa-trash-o'></i>&nbsp; Delete</button>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
