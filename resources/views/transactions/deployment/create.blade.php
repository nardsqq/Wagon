@extends('main')
@section('content')

    <header id="header">
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <h1><i class="fa fa-bar-chart" aria-hidden="true"></i> Transactions</h1>
                </div>
                <div class="col-md-2">

                </div>
            </div>
        </div>
    </header>

    <div class="container fadeIn">
        @include('partials._menu')
    </div>
    

    <section id="breadcrumb">
        <div class="container animated fadeIn">
            <ol class="breadcrumb">
                <li>Admin</li>
                <li>Transactions</li>
                <li>Generate Invoice</li>
                <li>Create</li>
            </ol>
        </div>
    </section>

    <section id="main">
        <div class="container">
            <div class="row">
                <div class="col-xs-12" id="deployment">
                    
                     @include('transactions.deployment.assign')
                    <div class="panel">
                        <div class="panel-body">
                                {{ Form::open(['id'=>'deployment-form', 'class'=>'form-horizontal', 'route'=>'process-deployment.store', 'method'=>'POST', '@submit.prevent'=>'submitForm']) }}
                                <div class="row">                
                                    <div :class="'form-group '+ (false == order?'has-error':'')" style="margin: 20px;">
                                        {!! Form::label('order_no', 'Order #') !!}
                                        <div class="input-group">
                                            {{--  <input type="text" id="order_no" name="order_no" class="form-control" v-model="order_no" placeholder="Enter Order #">  --}}
                                            {!!Form::select('order_no', $orders, null, array('class' => 'form-control', 'id' => 'order_no', 'required' => true, 'v-model'=>'order_no' ) ); !!}
                                            <span class="input-group-btn" @click="getServiceOrders()" aria-describedby="order-help-block">
                                                <button class="btn btn-default" type="button"><i class="fa fa-check"></i>&nbsp;Select</button>
                                            </span>
                                        </div><!-- /input-group -->
                                    </div>

                                    <div style="margin: 20px;">
                                        <button type="submitForm" class="btn btn-info pull-right">Submit</button>
                                        <button @click="cancel" class="btn btn-danger pull-right">Cancel</button>
                                    </div>
                                    
                                    <div v-if="order" class="col-xs-12 m-t-20">
                                        <h3>Services</h3>
                                        <table id="selected_prod_dataTable" class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">Service</th>
                                                    <th class="text-center">Date of Mobilization</th>
                                                    <th class="text-center">Date of De-Mobilization</th>
                                                    <th class="text-center">Personnel/s</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-if="order.service_orders.length === 0">
                                                    <td colspan="4" class="text-center">No services found</td>
                                                </tr>
                                                <tr v-else v-for="service_order in order.service_orders" :key="service_order.int_service_order_id">
                                                    <td>@{{ service_order.service.str_service_name }}
                                                        <input type="hidden" name="service_orders[]" :value="service_order.int_service_order_id">
                                                    </td>
                                                    <td>
                                                        <input type="date" :name="'dat_start['+service_order.int_service_order_id+']'" class="form-control">
                                                    </td>
                                                    <td>
                                                        <input type="date" :name="'dat_end['+service_order.int_service_order_id+']'" class="form-control">
                                                    </td>
                                                    <td>
                                                        <button v-if="isEmpty(service_order.personnels)" type="button" class="btn btn-sm btn-info"  @click="assignPersonnels(service_order)" data-toggle="modal" data-target="#assign-modal">Assign Personnels</button>
                                                        <span v-else>
                                                            <input type="hidden" v-for="personnel in service_order.personnels" :key="personnel.int_personnel_id" :value="personnel.int_personnel_id" :name="'personnels['+service_order.int_service_order_id+'][]'">
                                                            @{{ service_order.personnels.str_var_name }}
                                                            <a href="#" class="text-underline text-muted" @click="assignPersonnels(service_order)" data-toggle="modal" data-target="#assign-modal">(Change personnels)</a>
                                                        </span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('styles')

@endsection

@section('scripts')
    <script src="{{ asset('/js/app.js/') }}"></script>
    <script src="{{ asset('/js/ajax/transactions/deployment.js/') }}"></script>
@endsection