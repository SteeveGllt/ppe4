<?php

use Illuminate\Database\Seeder;
use App\Type;
use App\Categorie;
use App\User;

class PosteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('postes')->insert ([
            'intitule' => "test",
            'description' => "Tu fais du pain",
            'ville' => "Y",
            'nomEntreprise' => "Je sais plus",
            'pdf' => "pdf emploi",
            'isValide' => 1,
            'type_id' => Type::all()->find(3)->id,
            'categorie_id' => Categorie::all()->find(3)->id,
            'user_id' => User::all()->find(5)->id,
        ]);
    }
}
