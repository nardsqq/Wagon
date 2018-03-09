{{ Form::open(['id'=>'adv-search-form','route'=> Route::currentRouteName(), 'method'=>'GET']) }}
  {{ Form::hidden('filter', true) }}
  <div class="row">
    <div class="col-xs-6">
        Client:
        <select name="int_order_client_id_fk" class="form-control" data-index="1">
            <option value="">All Clients</option>    
            @foreach($clients as $client)
                <option>{{ $client->str_client_name }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-xs-6">
      {!! Form::label('str_order_no ', 'Order Number') !!}
      {!! Form::text('str_order_no ', null, ['id' => 'str_order_no ', 'class' => 'form-control', 'placeholder' => 'e.g Juan Dela Cruz', 'data-index'=>0]) !!}
    </div>
  </div>
  <div class="row m-t-10">
    <div class="col-xs-6">
      {!! Form::label('str_contact_person  ', 'Client Representative Name') !!}
      {!! Form::text('str_contact_person  ', null, ['id' => 'str_contact_person  ', 'class' => 'form-control', 'placeholder' => 'e.g. Juan Dela Cruz', 'data-index'=>2]) !!}
    </div>
    <div class="col-xs-6">
      {!! Form::label('str_landmark  ', 'Nearby Landmark') !!}
      {!! Form::text('str_landmark  ', null, ['id' => 'str_landmark  ', 'class' => 'form-control', 'placeholder' => 'e.g. Robinsons Galleria, POEA', 'data-index'=>4]) !!}
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
      <th>Purchase Order #</th>
      <th>Client</th>
      <th>Representative</th>
      <th>Contact</th>
      <th>Nearby Landmark</th>
      <th>Delivery Address</th>
      <th>Billing Address</th>
      <th>Date Processed</th>
    </tr>
  </thead>
</table>

@section('datatable-columns')
    { data: 'str_order_no', name: 'str_order_no'},
    { data: 'client.str_client_name', name: 'client.str_client_name'},
    { data: 'str_contact_person', name: 'str_contact_person'},
    { data: 'str_contact_num', name: 'str_contact_num' },
    { data: 'str_landmark', name: 'str_landmark' },
    { data: 'txt_deli_address', name: 'txt_deli_address' },
    { data: 'txt_bill_address', name: 'txt_bill_address' },
    { data: 'created_at', name: 'created_at'},
@endsection