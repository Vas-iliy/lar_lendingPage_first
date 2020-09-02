<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        factory(\App\Page::class, 2)->create();
        factory(\App\People::class, 3)->create();
        factory(\App\Portfolio::class, 8)->create();
        factory(\App\Servic::class, 6)->create();
    }
}
