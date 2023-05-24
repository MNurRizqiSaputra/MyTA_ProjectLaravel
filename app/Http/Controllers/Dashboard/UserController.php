<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('pages.dashboard.user.index', [
            'users' => User::with('role')->get(),
        ]);
    }
}
