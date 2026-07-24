<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Buat mahasiswa contoh
        User::create([
            'name' => 'Mahasiswa Test',
            'email' => 'mahasiswa@test.com',
            'password' => Hash::make('password123'),
            'role' => 'mahasiswa',
            'university' => 'Universitas Test',
        ]);

        // Tambahkan user random jika diperlukan (misal pakai Faker)
        // ...
    }
}