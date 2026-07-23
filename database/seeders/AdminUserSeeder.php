<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        $email = 'admin@portova.com';
        $password = 'password123';

        // Cek apakah admin sudah ada
        $admin = User::where('email', $email)->first();

        if ($admin) {
            // Jika sudah ada, update password dan role (jika perlu)
            $admin->update([
                'password' => Hash::make($password),
                'role' => 'admin',
                'name' => 'Admin Portova',
                'university' => 'Universitas Admin',
            ]);
        } else {
            // Buat admin baru
            User::create([
                'name' => 'Admin Portova',
                'email' => $email,
                'password' => Hash::make($password),
                'role' => 'admin',
                'university' => 'Universitas Admin',
            ]);
        }
    }
}