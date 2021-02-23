<?php

use Illuminate\Database\Seeder;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
        DB::table('categories')->insert ([
            'libelle' => "reseau",
        ]);
        }
        {
            DB::table('categories')->insert ([
                'libelle' => "montage_pc",
            ]);
        }
        {
            DB::table('categories')->insert ([
                'libelle' => "developpement",
            ]);
        }
        
    }
}
