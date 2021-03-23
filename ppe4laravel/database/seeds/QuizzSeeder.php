<?php

use Illuminate\Database\Seeder;

class QuizzSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
        DB::table('quizzs')->insert ([
            'titre' => "Quizzine",
        ]);
        }
        {
             DB::table('quizzs')->insert ([
            'titre' => "Quizz De Poulet",
        ]);
        }
    }
}
