<table id="dataTable" class="table table-bordered table-hover" style="visibility: hidden;" width="100%">
  <thead>
    <tr>
      <th>Part Number</th>
      <th class="text-center">Supplier</th>
      <th class="text-center">Product</th>
      <th class="text-center">Re-Stock Level</th>
      <th class="text-center">Quantity</th>
      <th class="text-center">Status</th>
      <th class="text-center">Action</th>
    </tr>
  </thead>
  <tbody id="stock-list">
    <tr id="#">
        <td>PARTNUMSAMPLE001</td>
        <td class="text-center">Supplier Name</td>
        <td class="text-center">Brand Product Name - Product Model</td>
        <td class="text-center">10</td>
        <td class="text-center">0</td>
        {{-- @if($stock->intQuantity > $stock->variants->intVarReStockLevel)
          <td class="text-center"><span class="label label-default">Normal</span></td>
        @elseif($stock->intQuantity <= $stock->variants->intVarReStockLevel && $stock->intQuantity > 0)
          <td class="text-center"><span class="label label-warning">Needs Re-Stock</span></td>
        @elseif($stock->intQuantity == 0) --}}
          <td class="text-center"><span class="label label-danger">Out of Stock</span></td>
        {{-- @endif --}}
        <td class="text-center">
          <a href="#" class="btn btn-sm btn-default"><i class='fa fa-circle-o'></i>&nbsp; Details</a>
        </td>
    </tr>
  </tbody>
</table>
