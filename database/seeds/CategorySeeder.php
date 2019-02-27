<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {
       DB::table('categories')->insert([
         [
             'category_name' => 'Uncategorized',
             'media_id' => 1,
         ],
         [
             'category_name' => 'General',
             'media_id' => 2,
         ],
         [
             'category_name' => 'Travel',
             'media_id' => 2,
         ],
         [
             'category_name' => 'Nature',
             'media_id' => 2,
         ],
         [
             'category_name' => 'Entertainment',
             'media_id' => 2,
         ],
         [
             'category_name' => 'Arts',
             'media_id' => 2,
         ],
         [
             'category_name' => 'Sports',
             'media_id' => 2,
         ]
       ]);
     }
}
