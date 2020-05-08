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
         $this->call(UserSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(OpportunitySeeder::class);
        $this->call(QuestionSeeder::class);
        $this->call(CommentSeeder::class);
        $this->call(FavoriteSeeder::class);
    }
}
