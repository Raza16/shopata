<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BrandTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $brand=[
            [
                'id'=>1,'title'=>'Genmega','image'=>'','status' => 1,'user_id'=>1
            ],
            [
                'id'=>2,'title'=>'Nautilus Hyosung','status' => 1,'image'=>'','user_id'=>1
            ],
            [
                'id'=>3,'title'=>'Hantle','status' => 1,'image'=>'','user_id'=>1
            ],
            [
                'id'=>4,'title'=>'Valor','status' => 1,'image'=>'','user_id'=>1
            ],
        ];
        foreach ($brand as $key => $record) {
            # code...
            \App\Models\Admin\Brand::create($record);
        }
    }
}
