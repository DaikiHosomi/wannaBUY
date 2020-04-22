<?php

use Illuminate\Database\Seeder;

class ProductConditionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_conditions')->insert([
            ['product_condition' => '新品・未使用'],
            ['product_condition' => '書き込みはほとんどない'],
            ['product_condition' => '少しの書き込み汚れあり、'],
            ['product_condition' => 'やや書き込み汚れありあり'],
            ['product_condition' => '全体的に書き込み汚れありあり']
        ]);
    }
}
