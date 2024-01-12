<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $totalUser = User::where('role', '!=', 'admin')->count();
        return view('admin.dashboard.index', [
            'totalUser' => $totalUser
        ]);
    }
}
