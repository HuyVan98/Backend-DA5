<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'id' => '1',
            'name' => 'san pham 1',
            'slug' => 'san-pham-1',
            'image' => 'no-img.jpg',
            'price' => '1000000',
            'describer' => 'chi tiet',
            'info' => 'Gioi thieu',
            'featured' => '0',
            'cat_id' => '1',
        ]);
    }
}