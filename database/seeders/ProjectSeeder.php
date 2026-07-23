<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\User;
use Faker\Factory as Faker;

class ProjectSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('id_ID');

        // Cari user mahasiswa, jika tidak ada buat satu
        $user = User::where('role', 'mahasiswa')->first();
        if (!$user) {
            $user = User::create([
                'name' => 'Mahasiswa Test',
                'email' => 'mahasiswa@test.com',
                'password' => bcrypt('password'),
                'role' => 'mahasiswa',
                'university' => 'Universitas Test', // sesuaikan dengan kolom di tabel
                'image_profile' => null, // jika ada
            ]);
        }

        // Buat 5 proyek dengan status menunggu
        for ($i = 1; $i <= 5; $i++) {
            Project::create([
                'user_id' => $user->id,
                'title' => $faker->sentence(3), // judul random
                'desc' => $faker->paragraph(3), // deskripsi random
                'tech_stacks' => $faker->randomElement(['Laravel', 'React', 'Vue.js', 'Python', 'Node.js']),
                'link_repo' => 'https://github.com/example/' . $faker->slug(2),
                'link_demo' => 'https://demo.example.com/' . $faker->slug(2),
                'project_image' => 'project_' . $faker->numberBetween(1, 10) . '.jpg',
                'status' => 'menunggu',
                'created_at' => now()->subDays($i),
            ]);
        }

        // Tambahkan 1 disetujui dan 1 ditolak
        Project::create([
            'user_id' => $user->id,
            'title' => 'Proyek Disetujui',
            'desc' => 'Sudah disetujui admin',
            'tech_stacks' => 'Laravel, React',
            'link_repo' => 'https://github.com/example/approved',
            'link_demo' => 'https://demo.example.com/approved',
            'project_image' => 'approved.jpg',
            'status' => 'disetujui',
            'created_at' => now()->subDays(2),
        ]);

        Project::create([
            'user_id' => $user->id,
            'title' => 'Proyek Ditolak',
            'desc' => 'Ditolak oleh admin',
            'tech_stacks' => 'Python, Flask',
            'link_repo' => 'https://github.com/example/rejected',
            'link_demo' => 'https://demo.example.com/rejected',
            'project_image' => 'rejected.jpg',
            'status' => 'ditolak',
            'created_at' => now()->subDays(1),
        ]);
    }
}