<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // required
        $this->call(RoleTableSeeder::class);
        $this->call(StatusSeeder::class);
        $this->call(ContentStatusSeeder::class);
        $this->call(HomepageTagSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(MediaSeeder::class);
        // for testing
        $this->call(UserTableSeeder::class);
        $this->call(BlogSeeder::class);

    }
}
