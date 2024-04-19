<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Administrator',
                'email' => 'admin@mail.com',
                'user_status' => 1,
                'password' => bcrypt('admin123'), // Ganti 'password' dengan password yang diinginkan
                'role' => 'admin',
                'last_login'=> now(),
                'email_verified_at' => now(),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        User::insert($users);
    }
}
