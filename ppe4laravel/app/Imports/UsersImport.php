<?php
   
namespace App\Imports;
   
use App\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
    
class UsersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'prenom'=>$row['prenom'], 
            
            'nom'=>$row['nom'],
            
            'email'=>$row['email'],
            
            'password'=> \Hash::make('admin'),
            
            'premiereCo' =>0,
        ]);
    }
}