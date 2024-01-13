<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $totalUser = User::where('role', '!=', 'admin')->count();
        $totalMenu = Menu::count();
        $users = User::where('role', '!=', 'admin')->latest()->paginate(5);
        return view('admin.dashboard.index', [
            'totalUser' => $totalUser,
            'totalMenu' => $totalMenu,
            'users' => $users,
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->Session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/dashboard-login');
    }
}
