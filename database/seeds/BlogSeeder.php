<?php

use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {
       DB::table('blogs')->insert([
         [
             'title' => 'Lorem Ipsum Dolor Sit Amet',
             'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum',
             'media_id' => 2,
             'user_id' => 1,
             'category_id' => 1,
             'homepage_tag_id' => 2,
             'content_status_id' => 1,
             'created_at' => date('Y-m-d H:i:s'),
         ],
         [
             'title' => 'Lorem Ipsum Dolor Sit Amet',
             'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum',
             'media_id' => 2,
             'user_id' => 1,
             'category_id' => 2,
             'homepage_tag_id' => 2,
             'content_status_id' => 1,
             'created_at' => date('Y-m-d H:i:s'),
         ],
         [
             'title' => 'Lorem Ipsum Dolor Sit Amet',
             'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum',
             'media_id' => 2,
             'user_id' => 1,
             'category_id' => 3,
             'homepage_tag_id' => 2,
             'content_status_id' => 1,
             'created_at' => date('Y-m-d H:i:s'),
         ],
         [
             'title' => 'Lorem Ipsum Dolor Sit Amet',
             'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum',
             'media_id' => 2,
             'user_id' => 1,
             'category_id' => 4,
             'homepage_tag_id' => 3,
             'content_status_id' => 1,
             'created_at' => date('Y-m-d H:i:s'),
         ],
         [
             'title' => 'Lorem Ipsum Dolor Sit Amet',
             'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum',
             'media_id' => 2,
             'user_id' => 1,
             'category_id' => 5,
             'homepage_tag_id' => 3,
             'content_status_id' => 1,
             'created_at' => date('Y-m-d H:i:s'),
         ],
         [
             'title' => 'Lorem Ipsum Dolor Sit Amet',
             'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum',
             'media_id' => 2,
             'user_id' => 1,
             'category_id' => 6,
             'homepage_tag_id' => 3,
             'content_status_id' => 1,
             'created_at' => date('Y-m-d H:i:s'),
         ],
         [
             'title' => 'Lorem Ipsum Dolor Sit Amet',
             'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum',
             'media_id' => 2,
             'user_id' => 1,
             'category_id' => 7,
             'homepage_tag_id' => 4,
             'content_status_id' => 1,
             'created_at' => date('Y-m-d H:i:s'),
         ],
         [
             'title' => 'Lorem Ipsum Dolor Sit Amet',
             'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum',
             'media_id' => 2,
             'user_id' => 1,
             'category_id' => 3,
             'homepage_tag_id' => 4,
             'content_status_id' => 1,
             'created_at' => date('Y-m-d H:i:s'),
         ],
         [
             'title' => 'Lorem Ipsum Dolor Sit Amet',
             'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum',
             'media_id' => 2,
             'user_id' => 1,
             'category_id' => 4,
             'homepage_tag_id' => 4,
             'content_status_id' => 1,
             'created_at' => date('Y-m-d H:i:s'),
         ],
         [
             'title' => 'Lorem Ipsum Dolor Sit Amet',
             'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum',
             'media_id' => 2,
             'user_id' => 1,
             'category_id' => 5,
             'homepage_tag_id' => 4,
             'content_status_id' => 1,
             'created_at' => date('Y-m-d H:i:s'),
         ],
         [
             'title' => 'Lorem Ipsum Dolor Sit Amet',
             'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum',
             'media_id' => 2,
             'user_id' => 1,
             'category_id' => 6,
             'homepage_tag_id' => 4,
             'content_status_id' => 1,
             'created_at' => date('Y-m-d H:i:s'),
         ],
         [
             'title' => 'Lorem Ipsum Dolor Sit Amet',
             'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum',
             'media_id' => 2,
             'user_id' => 1,
             'category_id' => 7,
             'homepage_tag_id' => 4,
             'content_status_id' => 1,
             'created_at' => date('Y-m-d H:i:s'),
         ],
       ]);
     }
}
