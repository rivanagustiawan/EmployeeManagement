<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employees = [
            ['name' => 'Ali Rahman', 'email' => 'ali@example.com', 'department_id' => 1],
            ['name' => 'Budi Santoso', 'email' => 'budi@example.com', 'department_id' => 2],
            ['name' => 'Citra Lestari', 'email' => 'citra@example.com', 'department_id' => 3],
            ['name' => 'Sumiati', 'email' => 'sumiati@example.com', 'department_id' => 3],
            ['name' => 'Dewi Ayu', 'email' => 'dewi@example.com', 'department_id' => 4],
        ];

        foreach ($employees as $employee) {
            Employee::create($employee);
        }
    }
}
