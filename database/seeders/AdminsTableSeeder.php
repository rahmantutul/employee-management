<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('admins')->delete();
         $adminRecords = [
            [
                'id'=>1,
                'name'=>'Admin',
                'email'=>'admin@admin.com',
                'image'=>'default.png',
                'password'=>Hash::make('password'),

            ],
         ];
         foreach($adminRecords as $key => $records){
             \App\Models\Admin::create($records);
         }


    }
}
