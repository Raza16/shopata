<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RoleTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $role=[
            [
                'id'=>1,'name'=>'admin'
            ],
            [
                'id'=>2,'name'=>'vendor'
            ],
            [
                'id'=>3,'name'=>'editor'
            ],
            [
                'id'=>4,'name'=>'subscriber'
            ],
            [
                'id'=>5,'name'=>'customer'
            ],
            
        ];
        foreach ($role as $key => $record) {
            # code...
            \App\Models\Role::create($record);
        }
    }
}
