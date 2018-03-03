<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(DiscountSeeder::class);
        $this->call(DownpaymentSeeder::class);
        $this->call(PaymentModeSeeder::class);
        $this->call(PaymentTermSeeder::class);
        $this->call(ClientSeeder::class);
        $this->call(SupplierSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(ServiceSeeder::class);
    }
}
