<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\ItemOrder;
use App\ServiceOrder;
use App\ServiceOrderMaterial;
use App\ServiceOrderStatus;
use App\OrderFooter;
use App\OrderStatus;
use App\Client;
use App\Product;
use App\Service;
use App\PaymentTerm;
use App\Downpayment;
use App\Discount;
use App\ModeOfPayment;
use App\Variant;
use App\Material;
use Carbon\Carbon;


class ProcessOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();
        return view('transactions.order.index', compact('orders'));
    }

    public function formData()
    {
        $terms = PaymentTerm::all();
        $modes = ModeOfPayment::all();
        $downpayments = Downpayment::all();
        $discounts = Discount::all();

        $acqui_types = Material::$acqui_types;

        $clients = Client::all();
        $products = Product::with('variants.specs.prod_attrib.attribute', 'variants.product')->get();
        $services = Service::with('materials.product.variants.specs.prod_attrib.attribute')->get();

        return json_encode(compact(
            'clients', 'products', 'services', 'terms', 'modes', 'downpayments', 'discounts', 'acqui_types'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Product::all()->count() <= 0) {
            return redirect()->route('product.index')
            ->with('message', 'Please configure your available products first')
            ->with('alert', 'info');
        }

        if(Variant::all()->count() <= 0) {
            return redirect()->route('product-variant.index')
            ->with('message', 'Please configure your available product variants first')
            ->with('alert', 'info');
        }

        if(Service::all()->count() <= 0) {
            return redirect()->route('service.index')
            ->with('message', 'Please configure your available services first')
            ->with('alert', 'info');
        }

        if(ModeOfPayment::all()->count() <= 0) {
            return redirect()->route('mode-of-payment.index')
            ->with('message', 'Please configure your available mode of payments first')
            ->with('alert', 'info');
        }

        if(PaymentTerm::all()->count() <= 0) {
            return redirect()->route('payment-term.index')
            ->with('message', 'Please configure your available payment terms first')
            ->with('alert', 'info');
        }

        if(Downpayment::all()->count() <= 0) {
            return redirect()->route('downpayment.index')
            ->with('message', 'Please configure your available downpayment rates first')
            ->with('alert', 'info');
        }

        if(Discount::all()->count() <= 0) {
            return redirect()->route('discount.index')
            ->with('message', 'Please configure your available discount rates first')
            ->with('alert', 'info');
        }

        if(Client::all()->count() <= 0) {
            return redirect()->route('client.index')
            ->with('message', 'Please configure your list of clients first')
            ->with('alert', 'info');
        }

        return view('transactions.order.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // var_dump($request->all());
        // dd();
        try {
            // [todo] insert validation rules here

            \DB::beginTransaction();
            
            $order                          = new Order();
            $order->str_purc_order_num      = $request->order_num;
            $order->int_order_client_id_fk  = $request->client_id;
            $order->dat_order_date          = Carbon::now();
            $order->txt_deli_address        = $request->delivery_location;
            $order->txt_bill_address        = $request->billing_address;
            $order->str_landmark            = $request->landmark;
            $order->str_contact_num         = $request->contact_no;
            $order->str_contact_person      = $request->contact_person;
            $order->save();

            // product
            if($request->order_type == 0)
            {
                foreach($request->variants as $variant)
                {
                    $item_order                     = new ItemOrder();
                    $item_order->int_io_order_id_fk = $order->int_order_id;
                    $item_order->int_io_var_id_fk   = $variant;
                    $item_order->int_quantity       = $request->quantity[$variant];
                    $item_order->txt_remarks        = $request->remarks[$variant];
                    $item_order->save();
                }
            }
            // service
            else {
                foreach($request->service_id as $service_id){
                    $service_order = new ServiceOrder();
                    $service_order->int_so_order_id_fk      = $order->int_order_id;
                    $service_order->int_so_service_id_fk    = $service_id;
                    $service_order->txt_remarks             = 'Remarks'; //$request->remarks[$service_id];
                    $service_order->str_status              = ServiceOrderStatus::$status['NEW'];
                    $service_order->save();
                    // if(array_key_exists($service_id, $request->materials)){
                    if(isset($request->materials[$service_id])){
                        foreach($request->materials[$service_id] as $material_id){
                            $serv_mat = new ServiceOrderMaterial();
                            $serv_mat->int_sm_service_order_id_fk   = $service_order->int_service_order_id;
                            $serv_mat->int_sm_material_id_fk        = $material_id;
                            $serv_mat->int_acqui_type               = $request->acqui_type[$material_id];
                            $serv_mat->int_sm_var_id_fk             = $request->variant[$material_id];
                            $serv_mat->int_quantity                 = $request->quantity[$material_id];
                            $serv_mat->save();
                        }
                    }
                }
            }

            //footer
            $footer                             = new OrderFooter();
            $footer->int_of_order_id_fk         = $order->int_order_id;
            $footer->str_delivery_type          = $request->delivery_type;
            $footer->int_of_terms_pay_id_fk     = $request->term;
            $footer->int_of_mode_pay_id_fk      = $request->mode;
            $footer->int_of_discount_id_fk      = $request->discount;
            $footer->int_of_downpayment_id_fk   = $request->downpayment;
            $footer->save();
            
            $status                         = new OrderStatus();
            $status->int_orstat_order_id_fk = $order->int_order_id;
            $status->str_status             = OrderStatus::$status['NEW'];
            $status->save();

            \DB::commit();
        } 
        catch(Exception $e){
            \DB::rollback();

            return response()->json([
                'message'   => $e,
                'alert'     => 'error',
            ]);
        }

        return response()->json([
            'message'   => 'Successfully completed transaction',
            'alert'     => 'success',
            'invoice'   => action('ProcessOrderController@invoice', $order->int_order_id),
            'url'       => route('process-order.index')
        ]);
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

    public function invoice($id)
    {
        $order = Order::findOrFail($id);
        return view('transactions.order.invoice', compact('order'));
    }
}
