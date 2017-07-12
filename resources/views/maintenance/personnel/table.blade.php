<table id="dataTable" class="table table-bordered table-hover">
  <thead>
    <tr>
      <th>Name</th>
      <th>Department</th>
      <th>Position</th>
      <th>Contact Number</th>
      <th class="text-center">Status</th>
      <th class="text-center">Actions</th>
    </tr>
  </thead>
  <tbody id="personnel-list">
    @foreach ($personnel as $personnels)
    <tr id=id"{{$personnels->intPersID}}">
      <td>{{ $personnels->strPersFName }}
          {{ $personnels->strPersMName }}
          {{ $personnels->strPersLName }}</td>
      <td>{{ $personnels->strDepartmentName }}</td>
      <td>{{ $personnels->strPositionName }}</td>
      <td>{{ $personnels->strPersContactNumber }}</td>
      <td class="text-center">
        <input type="checkbox" id="isActive" name="isActive" value="{{$personnels->intPersID}}" 
          @if (($personnels->isActive)==1){{"checked"}}
          @endif data-toggle="toggle" data-style="android" data-onstyle="success" data-offstyle="default" data-on="Active" data-off="Inactive" data-size="mini"></td>
      <td class="text-center">
          <button class="btn btn-warning btn-sm btn-detail open-modal" value="{{$personnels->intPersID}}"><i class='fa fa-edit'></i>&nbsp; Edit</button>
          <button class="btn btn-danger btn-sm btn-delete" value="{{$personnels->intPersID}}"><i class='fa fa-trash-o'></i>&nbsp; Delete</button>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
