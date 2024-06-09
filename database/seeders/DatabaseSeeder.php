<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\EmployeeSeeder;
use Database\Seeders\DepartmentSeeder;
use Database\Seeders\EmployeeRoleSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $this->call([
            DepartmentSeeder::class,
            RoleSeeder::class,
            EmployeeSeeder::class,
            EmployeeRoleSeeder::class,
        ]);
    }
}
