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
          <td class="text-center">{{ $vehireq->datDeparture->format('M. d, Y') }}</td>
          <td class="text-center">{{ $vehireq->datEstReturn->format('M. d, Y') }}</td>
          <td class="text-center">
            <a class="btn btn-primary btn-sm" target="_blank" href="{{ route('vehicle-request-report', ['id' => $vehireq->intVehiReqID]) }}"><i class='fa fa-file-pdf-o'></i>&nbsp; Export PDF</a>
            <button class="btn btn-info btn-sm btn-detail open-modal" value="{{ $vehireq->intVehiReqID }}"><i class='fa fa-edit'></i>&nbsp; Edit</button>
            <button class="btn btn-danger btn-sm btn-delete" value="{{ $vehireq->intVehiReqID }}"><i class='fa fa-trash-o'></i>&nbsp; Delete</button>
          </td>
      </tr>
    @endforeach
  </tbody>
</table>
