<table id="dataTable" class="table table-bordered table-hover">
  <thead>
    <tr>
      <th>Order Reference</th>
      <th class="text-center">Date Created</th>
      <th class="text-center">Client</th>
      <th class="text-center">Status</th>
      <th class="text-center">Actions</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>18TQES</td>
      <td class="text-center">02-28-2018</td>
      <td class="text-center">
        Taiyo
      </td>
      <td class="text-center">
        {{-- @if($so->intSalesOrderStatus === 1) --}}
        <span class="label label-warning"><i class="fa fa-circle-o-notch fa-spin fa-fw" aria-hidden="true"></i>&nbsp; Pending</span>
        {{-- @else --}}
        {{-- <span class="label label-success"><i class="fa fa-check fa-fw" aria-hidden="true"></i>&nbsp; Complete</span> --}}
        {{-- @endif --}}
      </td>
      <td class="text-center">
          <button class="btn btn-details btn-xs btn-default"><i class="fa fa-circle-o fa-fw"></i>&nbsp; Details</button>
          <button class="btn btn-details btn-xs btn-primary"><i class="fa fa-reply fa-fw"></i>&nbsp; Refund</button>
          <button class="btn btn-cancel-order btn-xs btn-danger"><i class='fa fa-trash-o fa-fw'></i>&nbsp; Cancel</button>
      </td>
    </tr>
  </tbody>
</table>