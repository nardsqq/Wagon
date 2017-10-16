<table id="dataTable" class="table table-bordered table-hover" style="visibility: hidden;" width="100%">
  <thead>
    <tr>
      <th>Personnel</th>
      <th>Location</th>
      <th>Date of Departure</th>
      <th>Estimated Date of Return</th>
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
          <td>{{ $vehireq->strVehiReqLocation }}</td>
          <td>{{ $vehireq->datDeparture }}</td>
          <td>{{ $vehireq->datEstReturn }}</td>
          <td class="text-center">
            <button class="btn btn-info btn-sm btn-detail open-modal" value="{{ $vehireq->intVehiReqID }}"><i class='fa fa-edit'></i>&nbsp; Edit</button>
            <button class="btn btn-danger btn-sm btn-delete" value="{{ $vehireq->intVehiReqID }}"><i class='fa fa-trash-o'></i>&nbsp; Delete</button>
          </td>
      </tr>
    @endforeach
  </tbody>
</table>
