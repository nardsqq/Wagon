<table id="dataTable" class="table table-bordered table-hover">
  <thead>
    <tr>
      <th>Product Category</th>
      <th>Description</th>
      <th class="text-center">Status</th>
      <th class="text-center">Actions</th>
    </tr>
  </thead>
  <tbody id="productcategory-list">
    @foreach ($productcategory as $productcategories)
    <tr id=id"{{$productcategories->intProductCategoryID}}">
      <td>{{ $productcategories->strProductCategoryName }}</td>
      <td>{{ $productcategories->strDesc }}</td>
      <td class="text-center">
        <input type="checkbox" id="isActive" name="isActive" value="{{$productcategories->intProductCategoryID}}" 
          @if (($productcategories->isActive)==1){{"checked"}}
          @endif data-toggle="toggle" data-style="android" data-onstyle="success" data-offstyle="default" data-on="<i class='fa fa-thumbs-o-up'></i> Active" data-off="<i class='fa fa-thumbs-o-down'></i> Inactive" data-size="mini"></td>
      <td class="text-center">
          <button class="btn btn-warning btn-sm btn-detail open-modal" value="{{$productcategories->intProductCategoryID}}"><i class='fa fa-edit'></i>&nbsp; Edit</button>
          <button class="btn btn-danger btn-sm btn-delete" value="{{$productcategories->intProductCategoryID}}"><i class='fa fa-trash-o'></i>&nbsp; Delete</button>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
