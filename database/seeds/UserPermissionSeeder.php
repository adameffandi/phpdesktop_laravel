<?php

use Illuminate\Database\Seeder;

class UserPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {
       DB::table('user_permissions')->insert([
         [
             'edit_profile' => 1,
             'create_blog' => 1,
             'edit_blog' => 1,
         ]
       ]);
     }
}
