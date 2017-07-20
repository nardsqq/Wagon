<table id="dataTable" class="table table-bordered table-hover">
  <thead>
    <tr>
      <th>Product</th>
      <th>Product Category</th>
      <th>Serial Number</th>
      <th class="text-center">Status</th>
      <th class="text-center">Actions</th>
    </tr>
  </thead>
  <tbody id="product-list">
    @foreach ($product as $products)
    <tr id="id{{$products->intProductID}}">
      <td>{{ $products->strProductName }}</td>
      <td>{{ $products->strProductCategoryName }}</td>
      <td>{{ $products->strProductSerialNumber }}</td>
      <td class="text-center">
        <input type="checkbox" id="isActive" name="isActive" value="{{$products->intProductID}}" 
          @if (($products->isActive)==1){{"checked"}}
          @endif data-toggle="toggle" data-style="android" data-onstyle="success" data-offstyle="default" data-on="Active" data-off="Inactive" data-size="mini"></td>
      <td class="text-center">
          <button class="btn btn-warning btn-sm btn-detail open-modal" value="{{$products->intProductID}}"><i class='fa fa-edit'></i>&nbsp; Edit</button>
          <button class="btn btn-danger btn-sm btn-delete" value="{{$products->intProductID}}"><i class='fa fa-trash-o'></i>&nbsp; Delete</button>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
