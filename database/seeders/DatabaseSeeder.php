<?php

namespace Database\Seeders;

use App\Models\Role;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $adminUser = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => 'password123',
        ]);

        $this->call([
            RoleSeeder::class,
            CategorySeeder::class,
        ]);

        $adminRole = Role::where('name', 'admin')->first();
        $adminUser->roles()->attach($adminRole);
    }
}
