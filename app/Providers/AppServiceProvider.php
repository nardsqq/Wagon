<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Blade;

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
