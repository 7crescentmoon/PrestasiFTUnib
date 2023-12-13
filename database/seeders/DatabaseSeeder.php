<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'nama' => 'Super Admin',
            'npm_nip' => 'superadmin',
            'email' => 'superadmin@gmail.com',
            'jenis_kelamin' => 'Laki - Laki',
            'password' => Hash::make('qweqweqwe'),
            'role' => 'super admin',
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
