<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@sigerd.com',
            'password' => Hash::make('password'),
            'role' => 'administrador',
        ]);

        User::create([
            'name' => 'Trabajador Uno',
            'email' => 'trabajador1@sigerd.com',
            'password' => Hash::make('password'),
            'role' => 'trabajador',
        ]);

        User::create([
            'name' => 'Instructor Uno',
            'email' => 'instructor1@sigerd.com',
            'password' => Hash::make('password'),
            'role' => 'instructor',
        ]);
    }
}
