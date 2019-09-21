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
        factory(\App\User::class,100)->create();
        factory(\App\Portfolio::class,50)->create();
        factory(\App\ImagesPortfolio::class,100)->create();
        factory(\App\Category::class,5)->create();
        factory(\App\SubCategory::class,25)->create();
        factory(\App\LinkedAccount::class,100)->create();
        factory(\App\Job::class,200)->create();
        factory(\App\Feedback::class,300)->create();

    }
}
