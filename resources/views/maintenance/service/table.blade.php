<table id="dataTable" class="table table-bordered table-hover">
  <thead>
    <tr>
      <th>Service</th>
      <th>Service Category</th>
      <th>Description</th>
      <th class="text-center">Status</th>
      <th class="text-center">Actions</th>
    </tr>
  </thead>
  <tbody id="service-list">
    @foreach ($service as $services)
    <tr id=id"{{$services->intServiceID}}">
      <td>{{ $services->strServiceName }}</td>
      <td>{{ $services->strServiceCategName }}</td>
      <td>{{ $services->strDesc }}</td>
      <td class="text-center">
        <input type="checkbox" id="isActive" name="isActive" value="{{$services->intServiceID}}" 
          @if (($services->isActive)==1){{"checked"}}
          @endif data-toggle="toggle" data-style="android" data-onstyle="success" data-offstyle="default" data-on="Active" data-off="Inactive" data-size="mini"></td>
      <td class="text-center">
          <button class="btn btn-warning btn-sm btn-detail open-modal" value="{{$services->intServiceID}}"><i class='fa fa-edit'></i>&nbsp; Edit</button>
          <button class="btn btn-danger btn-sm btn-delete" value="{{$services->intServiceID}}"><i class='fa fa-trash-o'></i>&nbsp; Delete</button>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
