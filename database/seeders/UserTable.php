<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $adminrecords=[
            [
                'id'=>1,'name'=>'raza','email'=>'ra777471@gmail.com','password'=>Hash::make('pakistan123'),'role_id'=>1
            ],
            
        ];
        foreach ($adminrecords as $key => $record) {
            # code...
            \App\Models\User::create($record);
        }
    
    }
}
