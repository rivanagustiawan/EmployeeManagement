<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Employee;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function employee() {

        return view('pages.employee', [
            'employees' => Employee::all()
        ]);
    }

    public function department() {
        $departments = DB::select("SELECT
                                        departments.id,
                                        departments.name,
                                        COUNT(employees.id) as total_employee
                                    FROM
                                        departments
                                    LEFT JOIN employees ON employees.department_id = departments.id
                                    GROUP BY
                                        departments.id, departments.name;");

        return view('pages.department', [
            'departments' => $departments
        ]);
    }

    public function departmentEmployee($id) {
        $departments = Department::where('id', $id)->with('employees')->first();

        return view('pages.department-employee', [
            'department' => $departments
        ]);
    }

    public function role() {
        return view('pages.roles', [
            'roles' => Role::all()
        ]);
    }
}
