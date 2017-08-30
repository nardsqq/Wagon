<table id="dataTable" class="table table-bordered table-hover" style="visibility: hidden;" width="100%">
  <thead>
    <tr>
      <th>Name</th>
      <th>Duration</th>
      <th class="text-center">Actions</th>
    </tr>
  </thead>
  <tbody id="priceval-list">
    @foreach ($pricevals as $pr)
    <tr id="id{{$priceval->intPriceVID}}">
        <td>{{ $priceval->strPriceVName }}</td>
        <td>{{ $priceval->strPriceVDuration }}</td>
        <td class="text-center">
            <button class="btn btn-info btn-sm btn-detail open-modal" value="{{ $priceval->intPriceVID }}"><i class='fa fa-edit'></i>&nbsp; Edit</button>
            <button class="btn btn-danger btn-sm btn-delete" value="{{ $priceval->intPriceVID }}"><i class='fa fa-trash-o'></i>&nbsp; Delete</button>
        </td>
    </tr>
    @endforeach
  </tbody>
</table>
