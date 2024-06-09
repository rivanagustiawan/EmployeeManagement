<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EmployeeRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employeeRoles = [
            ['employee_id' => 1, 'role_id' => 1],
            ['employee_id' => 2, 'role_id' => 3],
            ['employee_id' => 3, 'role_id' => 2],
            ['employee_id' => 1, 'role_id' => 2],
            ['employee_id' => 4, 'role_id' => 4],
            ['employee_id' => 5, 'role_id' => 4],
        ];

        foreach ($employeeRoles as $employeeRole) {
            DB::table('employee_role')->insert($employeeRole);
        }
    }
}
