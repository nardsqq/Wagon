<table id="dataTable" class="table table-bordered table-hover" style="visibility: hidden;" width="100%">
  <thead>
    <tr>
      <th>Client</th>
      <th>Location</th>
      <th>Date</th>
      <th class="text-center">Actions</th>
    </tr>
  </thead>
  <tbody id="quotation">
    @foreach ($quotations as $quotation)
      <tr id="id{{ $quotation->intQuotHeadID }}">
        <td>{{ $quotation->client->strClientName }}</td>
        <td>{{ $quotation->strQuotHeadLocation }}</td>
        <td>{{ $quotation->dtmQuotHeadDateTime }}</td>
        <td class="text-center">
          <a class="btn btn-primary btn-sm" target="_blank" href="{{ route('quotation-report', ['id' => $quotation->intQuotHeadID]) }}"><i class='fa fa-file-pdf-o'></i>&nbsp; Export PDF</a>
          <button class="btn btn-danger btn-sm btn-delete" value="{{ $quotation->intQuotHeadID }}"><i class='fa fa-trash-o'></i>&nbsp; Cancel</button>
          @if($quotation->products->count() > 0)
          <a href="{{ route('sales-order.create') }}?quotation={{$quotation->intQuotHeadID }}" class="btn btn-info btn-sm" value="{{ $quotation->intQuotHeadID }}"><i class='fa fa-check'></i>&nbsp; Sales Order</button>
          @endif
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
