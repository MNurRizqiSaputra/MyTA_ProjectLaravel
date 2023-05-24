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
}
