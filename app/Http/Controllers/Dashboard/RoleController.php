<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        return view('pages.dashboard.role.index', [
            'roles' => Role::all(),
        ]);
    }

    public function create()
    {
        return view('pages.dashboard.role.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|unique:roles,nama'
        ]);

        Role::create($validated);
        return redirect()->route('role.index');
    }

    public function show(Role $role)
    {
        return view('pages.dashboard.role.show', [
            'role' => $role
        ]);
    }

    public function update(Request $request, Role $role)
    {
        $validated = $request->validate([
            'nama' => 'required|string|unique:roles,nama'
        ]);
        $role->update($validated);
        return redirect()->route('role.index');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('role.index');
    }
}