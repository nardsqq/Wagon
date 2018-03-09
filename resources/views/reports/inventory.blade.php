@extends('reports.layout')

@section('report-name', 'Stock Report')

@section('table')
    <thead>
        <tr>
            <th>Variant</th>
            <th>Product</th>
            <th>On-Hand(Start)</th>
            <th>In</th>
            <th>Out</th>
            <th>On-Hand(End)</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <td>TOTAL</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </tfoot>
@endsection

@section('datatable-columns')
{ data: 'str_var_name', name: 'str_var_name'},
{ data: 'product.str_product_name', name: 'product.str_product_name'},
{ data: 'start', name: 'start'},
{ data: 'in', name: 'in'},
{ data: 'out', name: 'out'},
{ data: 'end', name: 'end'},
@endsection