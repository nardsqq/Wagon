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
                <div class="col-xs-12" id="invoice">
                    <div class="panel">
                        <div class="panel-body">
                                {{ Form::open(['id'=>'invoice-form', 'class'=>'form-horizontal', 'route'=>'invoice.store', 'method'=>'POST', '@submit.prevent'=>'submitForm']) }}
                                <div class="row">                
                                    <div class="col-xs-12 m-t-10">
                                        <div :class="'form-group '+ (false == order_exists?'has-error':'')">
                                            {!! Form::label('order_no', 'Order #') !!}
                                            <div class="input-group">
                                                <input type="text" id="order_no" name="order_no" class="form-control" v-model="order_no" placeholder="Enter Order #">
                                                <span class="input-group-btn" @click="getInvoice()" aria-describedby="order-help-block">
                                                    <button class="btn btn-default" type="button"><i class="fa fa-search"></i>&nbsp;Search</button>
                                                </span>
                                            </div><!-- /input-group -->
                                            
                                            <span id="order-help-block" class="help-block" v-if="!order_exists">Order does not exist</span>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 m-t-10">
                                        <div v-if="!invoice">
                                            <button v-if="!invoice_url" type="submit" class="btn btn-info pull-right" disabled>Generate Invoice</button>
                                            <button v-else type="submit" class="btn btn-info pull-right">Generate Invoice</button>
                                        </div>
                                        <div v-else> 
                                            <button v-if="invoice" type="button" class="btn btn-info pull-right" @click="printInvoice">Print Invoice</button>
                                        </div>
                                        <button @click="cancel" class="btn btn-danger pull-right">Cancel</button>
                                    </div>
                                    
                                    <div v-if="invoice">
                                        <iframe id="invoice_print" style="border:1px solid #CCC; margin-top: 20px; margin-left: 1.5in;" title="Invoice" :src="invoice_url" frameborder="1" scrolling="auto" height="1100" width="850"></iframe>
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
    <script src="{{ asset('/js/ajax/transactions/invoice.js/') }}"></script>
@endsection