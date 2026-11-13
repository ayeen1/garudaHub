<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            ['Admin Garuda',    'admin@example.com',  'admin',     'admin123'],
            ['Budi Santoso',    'budi@example.com',   'client',    'klien123'],
            ['Siti Rahayu',     'siti@example.com',   'client',    'klien123'],
            ['Agus Wijaya',     'agus@example.com',   'client',    'klien123'],
            ['Dewi Lestari',    'dewi@example.com',   'developer', 'dev123'],
            ['Eko Prasetyo',    'eko@example.com',    'developer', 'dev123'],
            ['Fitri Handayani', 'fitri@example.com',  'developer', 'dev123'],
            ['Gilang Ramadhan', 'gilang@example.com', 'developer', 'dev123'],
        ];

        foreach ($users as [$nama, $email, $role, $password]) {
            User::create([
                'name' => $nama,
                'email' => $email,
                'role' => $role,
                'password' => $password,
            ]);
        }
    }
}
