<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            array(
                'name' => 'super master',
                'email' => 'master@master.com',
                'user_id' => '1',
                'email_verified_at' => new \Datetime(),
                'password' => Hash::make('master'),
                'photo' => 'img/avatar_default.png',
                'login_2fa_statu' => 1,
                'created_at' => new \Datetime(),
                'updated_at' => new \Datetime(),
            )
        );
    }
}
