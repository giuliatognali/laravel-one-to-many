<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $this->call([
        TypeSeeder::class,      //Typeseeder prima di Project perchè poi assegno i project a ai type
        ProjectSeeder::class
        ]);
    }
}
