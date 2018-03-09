{{ Form::open(['id'=>'adv-search-form','route'=> Route::currentRouteName(), 'method'=>'GET']) }}
  {{ Form::hidden('filter', true) }}
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
      <button type="submit" class="btn btn-success col-xs-12" name="button"><i class="fa fa-search fa-fw"></i>&nbsp; Filter</button>
    </div>
  </div>
{{ Form::close() }}

<hr>

<table id="dataTable" class="table table-bordered table-hover" width="100%">
  <thead>
    <tr>
      <th>Client</th>
      <th>Representative</th>
      <th>TIN</th>
    </tr>
  </thead>
</table>

@section('datatable-columns')
    { data: 'int_client_id', name: 'int_client_id'},
    { data: 'str_client_name', name: 'str_client_name'},
    { data: 'str_client_person', name: 'str_client_person'},
    { data: 'str_client_tin', name: 'str_client_tin'},
@endsection