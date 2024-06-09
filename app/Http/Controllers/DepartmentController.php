<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class DepartmentController extends Controller
{
    
    public function index() {
        $departments = DB::select("SELECT
                                        departments.id,
                                        departments.name,
                                        departments.deleted_at,
                                        COUNT(employees.id) as total_employee
                                    FROM
                                        departments
                                    LEFT JOIN employees ON employees.department_id = departments.id
                                    WHERE  departments.deleted_at IS NULL
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

    public function edit($id)
    {

        if(Gate::denies('update')) {
            return redirect('/department')->with('error', 'Only Admin / Super Admin Access.');
        }

        $department = Department::where('id', $id)->first();

        if (!$department) {
            return redirect()->route('department')->with('error', 'Employee not found');
        }

        return view('pages.department-edit', [
            'department' => $department,
        ]);
    }

    public function update(Request $request, $id) {
        if(Gate::denies('update')) {
            return redirect('/department')->with('error', 'Only Admin / Super Admin Access.');
        }
        
        $request->validate([
            'name' => 'required'
        ]);

        Department::where('id', $id)->update([
            'name' => $request->name
        ]);

        return redirect('department')->with('success', 'Success Edit Department');

    }

    public function destroy($id) {
        if(Gate::denies('delete')) {
            return redirect('/department')->with('error', 'Only Super Admin Access.');
        }

        Department::where('id', $id)->delete();

        return redirect('department')->with('success', 'Success Delete Department: ');


    }
}
