<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Blade;

use App\Invoice;
use App\InvoiceStatus;
use App\Payment;
use App\Order;
use App\OrderStatus;

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

        // create invoice status on creation of an invoice
        Invoice::saved(function ($invoice) {
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
