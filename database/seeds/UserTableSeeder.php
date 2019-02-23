<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {
       DB::table('users')->insert([
           'name' => 'Adam',
           'role_id' => '1',
           'email' => 'adam@email.com',
           'password' => Hash::make(123456),
       ],
       [
           'name' => 'User',
           'role_id' => '2',
           'email' => 'user@email.com',
           'password' => Hash::make(123456),
       ]);
     }
}
