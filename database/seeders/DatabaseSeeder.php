<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $user = User::create([
            'name' => 'Super Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin1234'),
            'status' => 1,
            'role' => 'super-admin',
            'email_verified_at' => now(),
            'last_seen' => now(),
        ]);

        Role::create(['name' => 'super-admin', 'guard_name' => 'web']);

        // Assign the 'super-admin' role to the user
        $user->assignRole('super-admin');
    }
}
