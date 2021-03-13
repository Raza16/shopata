<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class SettingTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $setting=[
            'id'=>1,'title'=>'Shop ata Click','email'=>'support@shopataclick.com','phone'=>'718-412-1413','address'=>'182 Bay Ridge Ave. Brooklyn, New York 11220'
        ];

        DB::table('settings')->insert($setting);
    }
}
