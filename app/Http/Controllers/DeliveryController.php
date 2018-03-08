<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Delivery;

class DeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::whereHas('item_orders')->get();
        return view('transactions.delivery.index', compact('orders'));
    }

    public function formData()
    {
        // $terms = PaymentTerm::all();
        // $modes = ModeOfPayment::all();
        // $downpayments = Downpayment::all();
        // $discounts = Discount::all();

        // $acqui_types = Material::$acqui_types;

        // $clients = Client::all();
        // $products = Product::with('variants.specs.prod_attrib.attribute', 'variants.product')->get();
        // $services = Service::with('materials.product.variants.specs.prod_attrib.attribute')->get();

        // $current_no = Order::latest()->first() ? Order::latest()->first()->str_order_no:null;
        // $order_num[0] = \Counter::generate($current_no, Order::$prefix, Order::$suffix[0]);
        // $order_num[1] = \Counter::generate($current_no, Order::$prefix, Order::$suffix[1]);

        // return json_encode(compact(
        //     'clients', 'products', 'services', 'terms', 'modes', 'downpayments', 'discounts', 'acqui_types', 'order_num'
        // ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('transactions.delivery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
