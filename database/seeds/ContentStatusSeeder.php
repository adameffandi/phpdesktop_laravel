<?php

use Illuminate\Database\Seeder;

class ContentStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {
       DB::table('content_status')->insert([
         [
             'status' => 'Published',
         ],
         [
             'status' => 'Unpublished',
         ],
         [
             'status' => 'Draft',
         ]
       ]);
     }
}
