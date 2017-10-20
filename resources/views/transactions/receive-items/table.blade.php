<table id="dataTable" class="table table-bordered table-hover" style="visibility: hidden;" width="100%">
  <thead>
    <tr>
      <th>PO Reference Number</th>
      <th>Supplier</th>
      <th>Date</th>
      <th>Total Quantity</th>
      <th class="text-center">Actions</th>
    </tr>
  </thead>
  <tbody id="mode-list">
    @foreach($headers as $header)
    <tr id="id{{$header->intRecDelID}}">
        <td>{{$header->intRecDelPONum}}</td>
        <td>{{$header->supplier->strSuppName}}</td>
        <td>{{ $header->intRecDelDtmRec->format('F d, Y')}}</td>
        <td>{{$header->details->count() }}</td>
        <td class="text-center">
            <a href="#" class="btn btn-sm btn-default"><i class='fa fa-circle-o'></i>&nbsp; Details</a>
        </td>
    </tr>
    @endforeach
  </tbody>
</table>
