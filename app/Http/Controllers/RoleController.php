<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

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
}
