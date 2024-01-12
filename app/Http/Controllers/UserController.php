<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $totalUser = User::where('role', '!=', 'admin')->count();
        $totalMenu = Menu::count();
        $users = User::where('role', '!=', 'admin')->orderBy('name', 'asc')->paginate(5);
        return view('admin.dashboard.index', [
            'totalUser' => $totalUser,
            'totalMenu' => $totalMenu,
            'users' => $users,
        ]);
    }
}
