<table id="dataTable" class="table table-bordered table-hover">
  <thead>
    <tr>
      <th>Service Category</th>
      <th>Description</th>
      <th class="text-center">Status</th>
      <th class="text-center">Actions</th>
    </tr>
  </thead>
  <tbody id="servicecategory-list">
    @foreach ($servicecategory as $servicecategories)
    <tr id=id"{{$servicecategories->intServiceCategID}}">
      <td>{{ $servicecategories->strServiceCategName }}</td>
      <td>{{ $servicecategories->strDesc }}</td>
      <td class="text-center">
        <input type="checkbox" id="isActive" name="isActive" value="{{$servicecategories->intServiceCategID}}" 
          @if (($servicecategories->isActive)==1){{"checked"}}
          @endif data-toggle="toggle" data-style="android" data-onstyle="success" data-offstyle="default" data-on="Active" data-off="Inactive" data-size="mini"></td>
      <td class="text-center">
          <button class="btn btn-warning btn-sm btn-detail open-modal" value="{{$servicecategories->intServiceCategID}}"><i class='fa fa-edit'></i>&nbsp; Edit</button>
          <button class="btn btn-danger btn-sm btn-delete" value="{{$servicecategories->intServiceCategID}}"><i class='fa fa-trash-o'></i>&nbsp; Delete</button>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
