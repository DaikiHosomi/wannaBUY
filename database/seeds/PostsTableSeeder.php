<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('posts')->insert([
            'user_id'=> 1,
            'title' => 'マーケティングの教科書探してます',
            'published_at' => Carbon::today()
          ]);  

    }
}
