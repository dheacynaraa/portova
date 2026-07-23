<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        // Cek apakah admin sudah ada, jika belum buat
        if (!User::where('email', 'admin@portova.com')->exists()) {
            User::create([
                'name' => 'Admin Portova',
                'email' => 'admin@portova.com',
                'password' => Hash::make('password123'),
                'is_admin' => true,
            ]);
        } else {
            // Jika sudah ada, update menjadi admin
            User::where('email', 'admin@portova.com')->update(['is_admin' => true]);
        }
    }
}