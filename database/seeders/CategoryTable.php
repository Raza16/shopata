<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoryTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $category=[
            [
                'id'=>1,'title'=>'ATM Machines','slug'=>'atm-machines','user_id'=>1
            ],
            [
                'id'=>2,'title'=>'Credit Card Terminals','slug'=>'credit-card-terminals','user_id'=>1
            ],
            [
                'id'=>3,'title'=>'Point of Sale (POS)','slug'=>'point-of-sale-pos','user_id'=>1
            ],
        ];
        foreach ($category as $key => $record) {
            # code...
            \App\Models\Admin\Category::create($record);
        }
    }
}
