<?php

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
        DB::table('users')->insert([
            'name' => 'admin',
            'slug' => 'admin',
            'email' => 'admin@gmail.com',
            'address' => 'Ha Noi',
            'phone' => '0926565696',
            'password' => Hash::make('123456'),
        ]);
    }
}
