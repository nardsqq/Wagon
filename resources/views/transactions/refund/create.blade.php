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
                <li>Process Refund</li>
                <li>Create</li>
            </ol>
        </div>
    </section>

    <section id="main">
        <div class="container">
            <div class="row">
                <div class="col-xs-12" id="refund">
                    <div class="panel">
                        <div class="panel-body">
                            {{ Form::open(['id'=>'refund-form', 'class'=>'form-horizontal', 'route'=>'refund.store', 'method'=>'POST', '@submit.prevent'=>'submitForm']) }}
                            <div class="row">
                                <div class="col-xs-12 m-t-10">
                                    <div :class="'form-group '+ (false == invoice_exists?'has-error':'')">
                                        {!! Form::label('invoice_no', 'Invoice #') !!}
                                        <div class="input-group">
                                            <input type="text" id="invoice_no" name="invoice_no" class="form-control"
                                                   v-model="invoice_no" placeholder="Enter Invoice #">
                                            <span class="input-group-btn" @click="getInvoice()"
                                                  aria-describedby="invoice-help-block">
                                                    <button class="btn btn-default" type="button"><i
                                                                class="fa fa-search"></i>&nbsp;Search</button>
                                                </span>
                                        </div><!-- /input-group -->

                                        <span id="invoice-help-block" class="help-block" v-if="!invoice_exists">Order does not exist</span>
                                    </div>
                                </div>

                                <div v-if="invoice">
                                    <div class="col-md-12 m-t-10">
                                        {!! Form::label('items_to_be_returned', 'Items To Be Returned') !!}
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                            <tr>
                                                <th class="text-center">Variant</th>
                                                <th class="text-center" style="width: 40px">Quantity</th>
                                                <th class="text-center">Price</th>
                                                <th class="text-center">Amount</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr v-for="(item, index)  in invoice_temp.order.item_orders"
                                                :key="item.variant.int_var_id">
                                                <td>@{{ item.variant.str_var_name }}
                                                    <input type="hidden" name="item_orders[]"
                                                           :value="item.int_item_order_id">
                                                </td>
                                                <td>
                                                    <input type="number" :name="'quantity['+item.int_item_order_id+']'"
                                                           class="btn btn-secondary btn-sm"
                                                           style="cursor: text;width: 100px;"
                                                           v-model.number="item.int_quantity" min="1"
                                                           :max="invoice.order.item_orders[index].int_quantity"
                                                           maxlength="2">
                                     
                                                </td>
                                                <td class="text-right">₱@{{ item.variant.prices[0].dbl_price }}</td>
                                                <td class="text-right">₱@{{ item.variant.prices[0].dbl_price *
                                                    item.int_quantity }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th colspan="3"><h4>Total</h4></th>
                                                <td><h4 class="text-right">₱ @{{ total_amount }}</h4></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="col-xs-12 m-t-30">
                                        <div class="col-md-3">
                                            <label>Received by: </label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" name="received_by" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-12 m-t-10">
                                    <button v-if="invoice" type="submit" class="btn btn-info pull-right">Submit</button>
                                    <button v-else type="button" disabled class="btn btn-info pull-right">Submit
                                    </button>
                                    <button @click="cancel" class="btn btn-danger pull-right">Cancel</button>
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
    <script src="{{ asset('/js/ajax/transactions/refund.js/') }}"></script>
@endsection