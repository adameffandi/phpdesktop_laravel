<?php

use Illuminate\Database\Seeder;

class MediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {
       DB::table('medias')->insert([
         [
             'media_title' => 'Background 1',
             'media_location' => 'img/bg-1.jpg',
             'media_type' => '.jpg',
             'uploader_id' => 1,
         ],
         [
             'media_title' => 'Background 2',
             'media_location' => 'img/bg-2.jpeg',
             'media_type' => '.jpeg',
             'uploader_id' => 1,
         ]
       ]);
     }
}
