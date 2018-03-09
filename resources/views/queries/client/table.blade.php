<form id="adv-search-form">
  <div class="row">
    <div class="col-xs-6">
      {!! Form::label('str_client_name ', 'Client Name') !!}
      {!! Form::text('str_client_name ', null, ['id' => 'str_client_name ', 'class' => 'form-control', 'placeholder' => 'e.g. Taiyo Marine Incorporated']) !!}
    </div>
    <div class="col-xs-6">
      {!! Form::label('str_client_tin ', 'Tax Identification Number') !!}
      {!! Form::text('str_client_tin ', null, ['id' => 'str_client_tin ', 'class' => 'form-control', 'placeholder' => 'e.g 265-683-857-000']) !!}
    </div>
  </div>
  <div class="row m-t-10">
    <div class="col-xs-6">
      {!! Form::label('str_client_person  ', 'Client Representative Name') !!}
      {!! Form::text('str_client_person  ', null, ['id' => 'str_client_person  ', 'class' => 'form-control', 'placeholder' => 'e.g. Juan Dela Cruz']) !!}
    </div>
    <div class="col-xs-6">
      {!! Form::label('str_client_landmark  ', 'Nearby Landmark') !!}
      {!! Form::text('str_client_landmark  ', null, ['id' => 'str_client_landmark  ', 'class' => 'form-control', 'placeholder' => 'e.g. Robinsons Galleria, POEA']) !!}
    </div>
  </div>
  <hr>
  <div class="row">
    <div class="col-md-4">
      
    </div>
    <div class="col-md-4 pull-right">
      <button type="button" id="filter" class="btn btn-success col-xs-12" name="button"><i class="fa fa-search fa-fw"></i>&nbsp; Filter</button>
    </div>
  </div>
</form>

<hr>

<table id="dataTable" class="table table-bordered table-hover" style="visibility: hidden;" width="100%">
  <thead>
    <tr>
      <th>Client</th>
      <th>TIN</th>
      <th>Address</th>
      <th>Mobile Number</th>
    </tr>
  </thead>
  <tbody id="prod-list">
      <tr id="">
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
  </tbody>
</table>
