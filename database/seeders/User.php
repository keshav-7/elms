<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use IntlChar;

class User extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_account')->insert([
            'staff_id' => IntlChar::random(0),
            'username' => Str::random(10),
            'password' => Str::make('password'),
            'user_type' => Str::random(0, 1),
        ]);
    }
}
