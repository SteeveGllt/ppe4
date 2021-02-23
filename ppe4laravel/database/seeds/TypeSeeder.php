<?php

use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('types')->insert([
            'libelle' => "CDI",
            ]);
            DB::table('types')->insert([
            'libelle' => "CDD",
            ]);
            DB::table('types')->insert([
            'libelle' => "Alternance",
            ]);
    }
}
