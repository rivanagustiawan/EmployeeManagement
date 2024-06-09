<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Role;
use App\Models\Employee;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;

class EmployeeController extends Controller
{
    
    public function index() {
        return view('pages.employee', [
            'employees' => Employee::all()
        ]);
    }

    public function create() {

        return view('pages.employee-add', [
            'departments' => Department::all(),
            'roles' => Role::all()
        ]);

    }

    public function store(Request $request) {

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'department' => 'required',
            'roles' => 'required',
            'roles.*' => 'required',
        ]);


        try {
            DB::beginTransaction();

            $employee = Employee::create([
                'name' => $request->name,
                'email' => $request->email,
                'department_id' => $request->department,
            ]);

            foreach($request->roles as $role) {
                DB::table('employee_role')->insert([
                    'employee_id' => $employee->id,
                    'role_id' => $role
                ]);
            }

            DB::commit();

        }catch(Exception $e) {
            DB::rollback();

            return Redirect::back()->withErrors(['error' => 'Error to add new employee.']);
        }


        return redirect('employee')->with('success', 'Success Add New Employee');
    }

    public function edit($id)
    {
        if(Gate::denies('update')) {
            return redirect('/employee')->with('error', 'Only Admin / Super Admin Access.');
        }

        $employee = Employee::where('id', $id)->with('roles')->first();

        if (!$employee) {
            return redirect()->route('employees')->with('error', 'Employee not found');
        }

        return view('pages.employee-edit', [
            'employee' => $employee,
            'departments' => Department::all(),
            'roles' => Role::all()
        ]);
    }

    public function update(Request $request, $id) {
        if(Gate::denies('update')) {
            return redirect('/employee')->with('error', 'Only Admin / Super Admin Access.');
        }
        
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'department' => 'required',
            'roles' => 'required',
            'roles.*' => 'required',
        ]);

        try {
            DB::beginTransaction();

            Employee::where('id', $id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'department_id' => $request->department,
            ]);

            DB::table('employee_role')->where('employee_id', $id)->delete();

            foreach($request->roles as $role) {
                DB::table('employee_role')->insert([
                    'employee_id' => $id,
                    'role_id' => $role
                ]);
            }

            DB::commit();

        }catch(Exception $e) {
            DB::rollback();

            return $e->getMessage();
        }


        return redirect('employee')->with('success', 'Success Edit Employee: '.$request->name);
    }
}
