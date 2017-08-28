<table id="dataTable" class="table table-bordered table-hover" style="visibility: hidden;" width="100%">
  <thead>
    <tr>
      <th>Price Validity</th>
      <th>Duration</th>
      <th class="text-center">Actions</th>
    </tr>
  </thead>
  <tbody id="price-validity-list">
    @foreach ($pricevals as $priceval)
    <tr id="id{{ $priceval->intPriceValID }}">
        <td>{{ $priceval->strPriceVName }}</td>
        <td>{{ $priceval->strPriceVDuration }}</td>
        <td class="text-center">
            <button class="btn btn-info btn-sm btn-detail open-modal" value="{{ $priceval->intPriceValID }}"><i class='fa fa-edit'></i>&nbsp; Edit</button>
            <button class="btn btn-danger btn-sm btn-delete" value="{{ $priceval->intPriceValID }}"><i class='fa fa-trash-o'></i>&nbsp; Delete</button>
        </td>
    </tr>
    @endforeach
  </tbody>
</table>
