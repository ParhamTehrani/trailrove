<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Config;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admins = [
            [
                'mobile'=>'09011051022',
                'full_name'=>'admin',
                'password'=>Hash::make('123'),
            ],
            [
                'mobile'=>'09123041890',
                'full_name'=>'فواد مشایخی',
                'password'=>Hash::make('123'),
            ],
        ];
        Admin::insert($admins);
//        Config::create([]);
    }
}
