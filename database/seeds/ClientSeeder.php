<?php

use Illuminate\Database\Seeder;
use App\Client;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Client::firstOrCreate([
            'str_client_name' => 'Client 1',
            'str_client_person' => 'Client Representative 1',
            'str_client_mobile_num' => '9076608069',
            'str_client_tel_num' => '625-5485',
            'str_client_email' => 'client@email.com',
            'txt_client_address' => 'Sample Address',
            'str_client_landmark' => 'Sample Landmark',
            'str_client_tin' => '99999-99999-9-9'
        ]);

        Client::firstOrCreate([
            'str_client_name' => 'Client 2',
            'str_client_person' => 'Client Representative 2',
            'str_client_mobile_num' => '9076708064',
            'str_client_tel_num' => '625-5475',
            'str_client_email' => 'clienttwo@email.com',
            'txt_client_address' => 'Sample Address',
            'str_client_landmark' => 'Sample Landmark',
            'str_client_tin' => '99999-99999-9-0'
        ]);
    }
}
