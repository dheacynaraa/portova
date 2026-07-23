<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        User::create([
            'name' => 'Admin Portova',
            'email' => 'admin@portova.com',
            'password' => Hash::make('password123'),
            'role' => 'admin',
            'university' => 'Universitas Admin',
        ]);

        // Mahasiswa contoh
        User::create([
            'name' => 'Mahasiswa Test',
            'email' => 'mahasiswa@test.com',
            'password' => Hash::make('12345678'),
            'role' => 'mahasiswa',
            'university' => 'Universitas Test',
        ]);

        // Tambahkan user random jika diperlukan
    }
}