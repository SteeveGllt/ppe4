<?php

use Illuminate\Database\Seeder;
use App\User;
class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       {
        DB::table('messages')->insert ([
            'titre' => "COUCOU",
            'contenu' => "reseau",
            'destinataire' => User::all()->find(2)->nom,
            'expediteur' => User::all()->find(3)->nom,
            'user_id' => User::all()->find(3)->id
        ]);
        }
        {
            DB::table('messages')->insert ([
            'titre' => "Secteur ?",
            'contenu' => "quel secteur",
            'destinataire' => User::all()->find(9)->nom,
            'expediteur' => User::all()->find(7)->nom,
            'user_id' => User::all()->find(7)->id
            ]);
        }
        {
            DB::table('messages')->insert ([
            'titre' => "Au fait",
            'contenu' => "du dev",
            'destinataire' => User::all()->find(1)->nom,
            'expediteur' => User::all()->find(5)->nom,
            'user_id' => User::all()->find(5)->id
            ]);
        }
    }
}
