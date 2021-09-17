<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Symfony\Component\Console\Question\Question;

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
            UserSeeder::class,
            QuizSeeder::class,
            QuestionSeeder::class
        ]);
    }
}
