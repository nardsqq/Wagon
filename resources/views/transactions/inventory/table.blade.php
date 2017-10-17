<table id="dataTable" class="table table-bordered table-hover" style="visibility: hidden;" width="100%">
  <thead>
    <tr>
      <th>PO Ref Number</th>
      <th class="text-center">Supplier</th>
      <th class="text-center">Product</th>
      <th class="text-center">Quantity</th>
      <th class="text-center">Inventory Cost</th>
      <th class="text-center">Date Acquired</th>
      <th class="text-center">Actions</th>
    </tr>
  </thead>
  <tbody id="stock-list">
    @foreach ($stocks as $stock)
      <tr id="id{{ $stock->intStockID }}">
          <td>{{ $stock->strPONumber }}</td>
          <td class="text-center">{{ $stock->suppliers->strSuppName }}</td>
          <td class="text-center">{{ $stock->variants->brands->strBrandName }} {{ $stock->variants->products->strProdName }} - {{ $stock->variants->strVarModel }}</td>
          <td class="text-center">{{ $stock->intQuantity }}</td>
          <td class="text-center">{{ $stock->decInventCost }}</td>
          <td class="text-center">{{ $stock->dtmAcquisition }}</td>
          <td class="text-center">
            <button class="btn btn-info btn-sm btn-detail open-modal" value="{{ $stock->intStockID }}"><i class='fa fa-edit'></i>&nbsp; Edit</button>
          </td>
      </tr>
    @endforeach
  </tbody>
</table>
