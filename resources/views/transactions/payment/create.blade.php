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
                <li>Process Payment</li>
                <li>Create</li>
            </ol>
        </div>
    </section>

    <section id="main">
        <div class="container">
            <div class="row">
                <div class="col-xs-12" id="payment">
                    <div class="panel">
                        <div class="panel-body">
                                {{ Form::open(['id'=>'payment-form', 'class'=>'form-horizontal', 'route'=>'payment.store', 'method'=>'POST', '@submit.prevent'=>'submitForm']) }}
                                <div class="row">                
                                    <div class="col-xs-12 m-t-10">
                                        <div :class="'form-group '+ (false == invoice_exists?'has-error':'')">
                                            {!! Form::label('invoice_no', 'Order #') !!}
                                            <div class="input-group">
                                                <input type="text" id="invoice_no" name="invoice_no" class="form-control" v-model="invoice_no" placeholder="Enter Order #">
                                                <span class="input-group-btn" @click="getInvoice()" aria-describedby="invoice-help-block">
                                                    <button class="btn btn-default" type="button"><i class="fa fa-search"></i>&nbsp;Search</button>
                                                </span>
                                            </div><!-- /input-group -->
                                            
                                            <span id="invoice-help-block" class="help-block" v-if="!invoice_exists">Order does not exist</span>
                                        </div>
                                    </div>

                                    <div v-if="invoice">
                                        <div class="col-md-6 m-t-10">
                                            {{--  <div class="form-group">  --}}
                                                {!! Form::label('amount_received', 'Amount Received') !!}
                                                <input type="number" id="amount_received" name="amount_received" class="form-control text-right" v-model.number="amount_received" placeholder="Amount Received">
                                            {{--  </div>  --}}
                                        </div>
                                        <div class="col-md-6 m-t-10">
                                            {{--  <div class="form-group">  --}}
                                                {!! Form::label('date_received', 'Date Received') !!}
                                            <input type="date" id="date_received" name="date_received" class="form-control" value="{{ date('Y-m-d') }}">
                                            {{--  </div>  --}}
                                        </div>
                                        
                                        <div class="col-xs-12 m-t-30">
                                            <div class="well">
                                                <h3 class="text-center">Account</h3>
                                                Client: @{{ client.str_client_name }}<br>
                                                Order: @{{ invoice.order.str_purc_order_num }}<br>
                                                &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Total Amount Due: @{{ amount_due | money }} <br>
                                                &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Amount Paid:  @{{ amount_paid | money }}<br>
                                                &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Balance Due:  @{{ balance_due | money }}<br>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 m-t-10">
                                        <button v-if="invoice" type="submit" class="btn btn-info pull-right">Submit</button>
                                        <button v-else type="button" disabled class="btn btn-info pull-right">Submit</button>
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
    <script src="{{ asset('/js/ajax/transactions/payment.js/') }}"></script>
@endsection