<?php

use Illuminate\Database\Seeder;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1;$i<=10;$i++)
        {
            DB::table('users')->insert([
                'id'=>$i,
                'nom'=>"nom $i",
                'prenom'=>"prenom $i",
                'email'=>"mail $i",
                'password'=>"passoire $i",
                'ville'=>"ville $i",
                'cp' =>"cp $i",
                'isAdmin'=>0,
                'tel'=>"06XXXXXXXX",
                'notif'=>"notif $i",
                'cvConsultable'=>1,
                'cheminCv'=>"cv ici $i",
                'premiereCo'=>1
            ]);
        }
    }
}
