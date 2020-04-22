<?php

use Illuminate\Database\Seeder;

class TransactionWaysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transaction_ways')->insert([
            ['transaction_way' => '天空受渡・現金取引'],
            ['transaction_way' => '下界受渡・現金取引'],
            ['transaction_way' => 'その他'],  
        ]);
    }
}
