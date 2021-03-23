<?php

use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
        DB::table('questions')->insert ([
            'libelle' => "Quelle est la différence enter un tyrannosaure et un micro-ondes ?",
            'reponse'=>"Il n'y en a pas, c'est la même chose.",
            'quizz_id'=>1,
        ]);
        }
        {
        DB::table('questions')->insert ([
            'libelle' => "Quelle est la différence entre un rouquin et un requin ?",
            'reponse'=>"Le rouquin a les cheveux de son père et le requin les dents de la mer.",
            'quizz_id'=>1,
        ]);
        }
        {
        DB::table('questions')->insert ([
            'libelle' => "Quelle est la différence entre un enfant qui fait des bêtises et un sapin de noël ?",
            'reponse'=>"Aucune! Les deux se font enguirlander.",
            'quizz_id'=>2,
        ]);
        }
        {
        DB::table('questions')->insert ([
            'libelle' => "Quelle est la différence entre une échelle et un pistolet ?",
            'reponse'=>"Aucune! Les deux se font enguirlander.",
            'quizz_id'=>2,
        ]);
        }
    }
}
