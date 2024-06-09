<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class RoleController extends Controller
{
    public function index() {
        return view('pages.roles', [
            'roles' => Role::all()
        ]);
    }

    public function create() {
        return view('pages.roles-add');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required'
        ]);

        Role::create([
            'name' => $request->name
        ]);

        return redirect('role')->with('success', 'Success Add New Department');

    }

    public function edit($id)
    {

        if(Gate::denies('update')) {
            return redirect('/role')->with('error', 'Only Admin / Super Admin Access.');
        }
        
        $employee = Role::where('id', $id)->first();

        if (!$employee) {
            return redirect()->route('role')->with('error', 'Employee not found');
        }

        return view('pages.roles-edit', [
            'role' => $employee,
        ]);
    }

    public function update(Request $request, $id) {
        if(Gate::denies('update')) {
            return redirect('/role')->with('error', 'Only Admin / Super Admin Access.');
        }
        
        $request->validate([
            'name' => 'required'
        ]);

        Role::where('id', $id)->update([
            'name' => $request->name
        ]);

        return redirect('role')->with('success', 'Success Edit Role');

    }
}
