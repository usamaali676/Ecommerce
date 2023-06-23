<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Role;
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
        Role::create([
            'name' => 'admin',
        ]);

        User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'role_id' => '1',
            'password' => Hash::make('password'),
                ]);
    }
}
