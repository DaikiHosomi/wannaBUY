<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'user_id'=> '1',
            'product_name' => 'Laravel入門',
            'introduction' => 'PHPのフレームワーク、Laravelの参考書です',
            'price' => 1500,
            'product_category_id' => 3,
            'product_condition_id' => 2,
            'transaction_way_id' => 1,
          ]);  
    }
}
