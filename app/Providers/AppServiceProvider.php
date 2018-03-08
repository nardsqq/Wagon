<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Blade;

use App\Invoice;
use App\InvoiceStatus;
use App\Payment;
use App\ItemOrder;
use App\Order;
use App\OrderStatus;
use App\OrderFooter;
use App\Delivery;
use App\DeliveryStatus;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Blade::directive('money', function($expression){
            if($expression < 0)
                return "<?php echo '(₱ '.number_format(round(abs($expression), 2),2,'.',',').')'; ?>";

            return "<?php echo '₱ '.number_format(round($expression, 2),2,'.',','); ?>";
        });
        Schema::defaultStringLength(191);

        // create order status on creation of an order
        Order::saved(function ($order) {
            OrderStatus::create([
                'str_status' => OrderStatus::$status['NEW'],
                'int_orstat_order_id_fk' => $order->int_order_id
            ]);
        });

        ItemOrder::created(function ($item_order){
            // delivery for items
            if($item_order->order->footer->str_delivery_type == 0){
                Delivery::firstOrCreate([
                    'int_del_order_id_fk' => $item_order->order->int_order_id
                ]);
            }
        });

        // delivery 
        Delivery::created(function ($delivery){
            DeliveryStatus::create([
                'int_delstat_delivery_id_fk' => $delivery->int_delivery_id,
                'str_status' => DeliveryStatus::$status['NEW']
            ]);
        });
        //delivery on progress
        Delivery::saved(function ($delivery){
            if($delivery->int_del_personnel_id_fk && $delivery->dat_delivery_date){
                DeliveryStatus::create([
                    'int_delstat_delivery_id_fk' => $delivery->int_delivery_id,
                    'str_status' => DeliveryStatus::$status['CONF']
                ]);
            }
        });

        
        // create invoice status on creation of an invoice
        Invoice::created(function ($invoice) {
            OrderStatus::create([
                'str_status' => OrderStatus::$status['BILL'],
                'int_orstat_order_id_fk' => $invoice->order->int_order_id
            ]);
            InvoiceStatus::create([
                'str_status' => InvoiceStatus::$status['NEW'],
                'int_instat_invoice_id_fk' => $invoice->int_invoice_id
            ]);
        });

        // payment
        Payment::saved(function ($payment){
            $invoice = $payment->invoice;
            // set status to sent
            InvoiceStatus::firstOrCreate([
                'str_status' => InvoiceStatus::$status['SENT'],
                'int_instat_invoice_id_fk' => $invoice->int_invoice_id
            ]);

            // if fully paid
            if($invoice->dbl_total_amount <= $invoice->payments()->sum('dbl_amount')){
                InvoiceStatus::create([
                    'str_status' => InvoiceStatus::$status['PAID'],
                    'int_instat_invoice_id_fk' => $invoice->int_invoice_id
                ]);
                OrderStatus::create([
                    'str_status' => OrderStatus::$status['PAID'],
                    'int_orstat_order_id_fk' => $invoice->order->int_order_id
                ]);
            }
        });

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
