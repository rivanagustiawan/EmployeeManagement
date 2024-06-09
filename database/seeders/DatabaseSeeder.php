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

        User::create([
            'name' => 'Rivan Agustiawan',
            'email' => 'rivan@example.com',
            'username' => 'admin',
            'password' => bcrypt('12345678'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@example.com',
            'username' => 'superadmin',
            'password' => bcrypt('12345678'),
            'role' => 'super-admin',
        ]);

        $this->call([
            DepartmentSeeder::class,
            RoleSeeder::class,
            EmployeeSeeder::class,
            EmployeeRoleSeeder::class,
        ]);
    }
}
