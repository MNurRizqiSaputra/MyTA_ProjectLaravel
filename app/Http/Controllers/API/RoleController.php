<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Models\Role;
use Exception;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        try {
            $roles = Role::all();
            if (!$roles) {
                throw new Exception("Role not found");
            }
            return ResponseFormatter::success($roles, "Roles found");
        } catch (Exception $e) {
            return ResponseFormatter::error($e->getMessage(), 500);
        }
    }

    public function store(CreateRoleRequest $request)
    {
        try {
            $role = Role::create([
                'nama' =>$request->nama
            ]);

            if (!$role) {
                throw new Exception("Role not created");
            }
            return ResponseFormatter::success($role, 'Role Created');
        } catch (Exception $e) {
            return ResponseFormatter::error($e->getMessage(), 500);
        }
    }

    public function update(UpdateRoleRequest $request, $id)
    {
        try {
            // Get Role by id
            $role = Role::findOrFail($id);

            // Check if role exists
            if (!$role) {
                throw new Exception('Role Not Found');
            }

            // Update role
            $role->update([
                'nama' => $request->nama
            ]);

            return ResponseFormatter::success($role, 'Role Updated');
        } catch (Exception $e) {
            return ResponseFormatter::error($e->getMessage(), 500);
        }
    }

    public function show($id)
    {
        try {
            // Get All Users by role
            $role = Role::findOrFail($id);

            // Check if role exists
            if (!$role) {
                throw new Exception('Role Not Found');
            }
            $users = $role->users;
            return ResponseFormatter::success($users, 'User With Role ' . $role->nama . ' found');
        } catch (Exception $e) {
            return ResponseFormatter::error($e->getMessage(), 500);
        }
    }

    public function destroy($id)
    {
        try {
            // get id role
            $role = Role::find($id);
            $role->delete();
            return ResponseFormatter::success($role, 'Role deleted successfully');
        } catch (Exception $e) {
            return ResponseFormatter::error($e->getMessage(), 500);
        }
    }
}
