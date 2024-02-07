<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsAuthsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings_auths')->insert(
            [
                array(
                    'descriptions' => 'Predeterminado',
                    'status' => 1,
                    'add_auth' => 0,
                    'created_at' => new \Datetime(),
                    'updated_at' => new \Datetime(),
                ),
                array(
                    'descriptions' => 'Predeterminado + Autenticacion doble factor',
                    'status' => 0,
                    'add_auth' => 0,
                    'created_at' => new \Datetime(),
                    'updated_at' => new \Datetime(),
                )
            ]
        );
    }
}
