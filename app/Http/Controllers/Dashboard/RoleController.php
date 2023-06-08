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
        $request->validate([
            'nama' => 'required'
        ]);

        $role = Role::create([
            'nama' => $request->input('nama')
        ]);

        $role->save();

        return redirect()->route('role.index')->with('success', 'Data berhasil ditambah');
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);

        return view('pages.dashboard.role.edit', compact('role'));
    }

    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);

        $request->validate([
            'nama' => 'required'
        ]);

        $role->update([
            'nama' => $request->input('nama')
        ]);

        return redirect()->route('role.index')->with('success', 'Data berhasil perbarui');
    }

    public function destroy(Request $request)
    {
        $roleId = $request->input('role_id');
        $role = Role::findOrFail($roleId);

        $role->delete();

        return redirect()->route('role.index')->with('success', 'Data berhasil dihapus');
    }
}
