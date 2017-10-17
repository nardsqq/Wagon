<table id="dataTable" class="table table-bordered table-hover" style="visibility: hidden;" width="100%">
  <thead>
    <tr>
      <th>Client</th>
      <th>Client Associate</th>
      <th>Location</th>
      <th class="text-center">Actions</th>
    </tr>
  </thead>
  <tbody id="quotation">
    @foreach ($quotations as $quotation)
      <tr id="id{{ $quotation->intQuotHeadID }}">
        <td>{{ $quotation->client->strClientName }}</td>
        <td>{{ $quotation->strClientAssoc }}</td>
        <td>{{ $quotation->strQuotHeadLocation }}</td>
        <td class="text-center">
          <a href="{{ route('quotation.show', $quotation->intQuotHeadID) }}" class="btn btn-sm btn-default"><i class='fa fa-circle-o'></i>&nbsp; View</a>
          <button class="btn btn-info btn-sm btn-detail open-modal" value="{{ $quotation->intQuotHeadID }}"><i class='fa fa-edit'></i>&nbsp; Edit</button>
          <button class="btn btn-danger btn-sm btn-delete" value="{{ $quotation->intQuotHeadID }}"><i class='fa fa-trash-o'></i>&nbsp; Delete</button>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
