<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->insert([
            'id' => '1',
            'name' => 'san pham 1',
            'slug' => 'san-pham-1',
            'address' => 'ha noi',
            'email' => 'nguyenvanb@gmail.com',
            'phone' => '0352626262',
            'total' => '5',
            'state' => '1',
            'note' => 'khong co'
        ]);
    }
}