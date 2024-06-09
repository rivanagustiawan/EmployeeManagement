<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepartmentController extends Controller
{
    
    public function index() {
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

    public function create() {
        return view('pages.department-add');
    }

    public function show($id) {
        $departments = Department::where('id', $id)->with('employees')->first();

        return view('pages.department-employee', [
            'department' => $departments
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required'
        ]);

        Department::create([
            'name' => $request->name
        ]);

        return redirect('department')->with('success', 'Success Add New Department');

    }
}
