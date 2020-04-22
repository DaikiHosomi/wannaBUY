<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=> "Daiki",
            'email' => 'root@root.com',
            'password' => bcrypt('daiki205'),
          ]);  
    }
}
