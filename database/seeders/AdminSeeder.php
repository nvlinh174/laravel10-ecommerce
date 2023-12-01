<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $password = Hash::make('123456');

        $adminRecords = [
            [
                'id' => 1,
                'name' => 'Van Linh',
                'type' => 'admin',
                'phone' => '0336405077',
                'email' => 'nvlinh17041992@gmail.com',
                'password' => $password,
                'image' => '',
                'status' => 1
            ],
        ];

        Admin::insert($adminRecords);
    }
}
