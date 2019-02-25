<?php

use Illuminate\Database\Seeder;

class HomepageTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {
       DB::table('homepage_tags')->insert([
         [
             'homepage_tag_name' => 'None',
         ],
         [
             'homepage_tag_name' => 'Trending',
         ],
         [
             'homepage_tag_name' => 'Most Popular',
         ],
         [
             'homepage_tag_name' => 'Latest',
         ]
       ]);
     }
}
