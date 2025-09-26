<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Admin 1
        User::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('password123'), // เปลี่ยนทีหลัง!
                'role' => 'admin',
            ]
        );
        //Admin 2
        User::updateOrCreate(
            ['email' => 'admin2@example.com'],
            [
                'name' => 'Second Admin',
                'password' => Hash::make('password123'),
                'role' => 'admin',
            ]
        );
        //Admin 3
        User::updateOrCreate(
            ['email' => 'admin3@example.com'],
            [
                'name' => 'Second Admin',
                'password' => Hash::make('password123'),
                'role' => 'admin',
            ]
        );
    }
}


