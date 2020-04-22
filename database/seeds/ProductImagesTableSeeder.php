<?php

use Illuminate\Database\Seeder;

class ProductImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_images')->insert([
            'product_id'=> 1,
            'product_image'=> "https://webty.jp/staffblog/wp-content/uploads/2019/08/thumbnail_laravel-660x500.png",
            'image_number' => 1,
          ]);  

          

    }
}
