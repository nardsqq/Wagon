<?php

use Illuminate\Database\Seeder;
use App\Personnel;
use App\Position;

class PersonnelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $positions = ['Chief Engineer', 'Driver', 'Sales Agent'];
        foreach($positions as $position){
            Position::firstOrCreate([
                'str_position_name' => $position,
                'txt_position_desc' => 'Responsible for '.$position.' duties'
            ]);
        }

        Personnel::firstOrCreate([
            'str_personnel_l_name' => 'Bond',
            'str_personnel_f_name' => 'Jordan',
            'str_personnel_m_name' => 'Leav',
            'int_pers_position_id_fk' => Position::first()->int_position_id, 
            'str_personnel_type' => 'Regular',
            'txt_personnel_address' => 'Caloocan City',
            'str_personnel_mobile_num' => '09000000000'
        ]);

        Personnel::firstOrCreate([
            'str_personnel_l_name' => 'delos Reyes',
            'str_personnel_f_name' => 'Tyron',
            'str_personnel_m_name' => '',
            'int_pers_position_id_fk' => Position::first()->int_position_id, 
            'str_personnel_type' => 'Regular',
            'txt_personnel_address' => 'Caloocan City',
            'str_personnel_mobile_num' => '09000055555'
        ]);

    }
}
