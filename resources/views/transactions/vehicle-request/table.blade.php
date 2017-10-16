<table id="dataTable" class="table table-bordered table-hover" style="visibility: hidden;" width="100%">
  <thead>
    <tr>
      <th>Personnel</th>
      <th class="text-center">Location</th>
      <th class="text-center">Date of Departure</th>
      <th class="text-center">Estimated Date of Return</th>
      <th class="text-center">Actions</th>
    </tr>
  </thead>
  <tbody id="vehireq-list">
    @foreach ($vehireqs as $vehireq)
      <tr id="id{{ $vehireq->intVehiReqID }}">
          <td>
            {{ $vehireq->pers->strPersFName }}
            {{ $vehireq->pers->strPersMName }}
            {{ $vehireq->pers->strPersLName }}
          </td>
          <td class="text-center">{{ $vehireq->strVehiReqLocation }}</td>
          <td class="text-center">{{ date('M j, Y h:ia', strtotime($vehireq->datDeparture)) }}</td>
          <td class="text-center">{{ date('M j, Y h:ia', strtotime($vehireq->datEstReturn)) }}</td>
          <td class="text-center">
            <button class="btn btn-info btn-sm btn-detail open-modal" value="{{ $vehireq->intVehiReqID }}"><i class='fa fa-edit'></i>&nbsp; Edit</button>
            <button class="btn btn-danger btn-sm btn-delete" value="{{ $vehireq->intVehiReqID }}"><i class='fa fa-trash-o'></i>&nbsp; Delete</button>
          </td>
      </tr>
    @endforeach
  </tbody>
</table>
