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
                <li>Replenish Stock</li>
                <li>Create</li>
            </ol>
        </div>
    </section>

    <section id="main">
        <div class="container">
            <div class="row">
                <div class="col-xs-12" id="stock-form">
                    <div class="panel">
                        <div class="panel-body">
                                {{ Form::open(['id'=>'replenish-stock-form', 'class'=>'form-horizontal', 'route'=>'replenish-stock.store', 'method'=>'POST', '@submit.prevent'=>'submitForm']) }}
                                <div class="row">            
                                    <div class="col-xs-6 m-t-10">
                                        {!! Form::label('int_prod_id_fk', 'Purchase Order Number') !!}
                                        <input name="purchase_order" type="text" placeholder="Purchase Order Number" class="form-control" required>
                                    </div>
                                    <div class="col-xs-6 m-t-10">
                                        {!! Form::label('supplier', 'Supplier') !!}
                                        <input type="hidden" name="supplier" :value="selected_supplier.int_supplier_id">
                                        <select class="form-control" v-model="selected_supplier" required>
                                            <option v-for="supplier in suppliers" :key="supplier.int_supplier_id" :value="supplier">@{{ supplier.str_supplier_name }}</option>
                                        </select>
                                    </div>
                                        
                                    
                                    <div class="col-xs-12 m-t-10">
                                        {!! Form::label('int_prod_id_fk', 'Product') !!}
                                        <input type="hidden" name="product_id" :value="selected_product.int_product_id">
                                        <select name="int_prod_id_fk" id="int_prod_id_fk" class="form-control" v-model="selected_product">
                                            <option v-for="product in products" :key="product.int_product_id" :value="product">@{{ product.str_product_name }}</option>
                                        </select>
                                    </div>
                                    
                                    <div class="col-xs-12 m-t-30">
                                        <table id="prod_dataTable" class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">Variant</th>
                                                    <th class="text-center">Current Stock</th>
                                                    <th class="text-center">Current Price</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="variant in variants" :key="variant.int_var_id"  :class="{'selected': isSelected(variant.int_var_id) }">
                                                    <td>
                                                        <span v-for="specs in variant.specs" :key="specs.int_specs_id">
                                                            <strong>@{{ specs.prod_attrib.attribute.str_attrib_name }}: </strong> @{{ specs.str_spec_constant }}<br>
                                                        </span>
                                                    </td>
                                                    <td>@{{ variant.stock }}</td>
                                                    <td>@{{ variant.price }}</td>
                                                    <td style="max-width: 47px;">
                                                        <button type="button" class="btn btn-sm btn-primary" @click="selectVariant(variant, $event)">@{{ !isSelected(variant.int_var_id) ? 'Select' : 'Remove' }}</button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-xs-12 m-t-30">
                                        <hr>
                                        <h3>Selected Items</h3>
                                        <table id="selected_prod_dataTable" class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">Product</th>
                                                    <th class="text-center">Variant</th>
                                                    <th class="text-center">Current Stock</th>
                                                    <th class="text-center">Quantity</th>
                                                    <th class="text-center">Unit Price</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-if="selected_variants.length === 0">
                                                    <td colspan="7" class="text-center">No items selected</td>
                                                </tr>
                                                <tr v-else v-for="variant in selected_variants" :key="variant.int_var_id">
                                                    <td>@{{ variant.product.str_product_name }}
                                                        <input type="hidden" name="variants[]" :value="variant.int_var_id">
                                                    </td>
                                                    <td>
                                                        <span v-for="specs in variant.specs" :key="specs.int_specs_id">
                                                            <strong>@{{ specs.prod_attrib.attribute.str_attrib_name }}: </strong> @{{ specs.str_spec_constant }}<br>
                                                        </span>
                                                    </td>
                                                    <td>@{{ variant.stock }}</td>
                                                    <td style="max-width: 70px;">
                                                       <input :name="'quantity['+variant.int_var_id+']'" type="number" placeholder="Quantity" class="form-control" min="1" v-model="variant.quantity" required>
                                                    </td>
                                                    <td style="max-width: 70px;">
                                                        <input :name="'price['+variant.int_var_id+']'" type="number" placeholder="Quantity" step="0.01" class="form-control" min="0.01" v-model="variant.price" required>
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-sm btn-primary" @click="selectVariant(variant, $event)">Remove</button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="col-xs-12 m-t-10">
                                        <button type="submit" class="btn btn-info pull-right">Submit</button>
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
    <script src="{{ asset('/js/ajax/transactions/replenish-stock.js/') }}"></script>
@endsection