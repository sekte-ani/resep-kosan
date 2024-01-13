<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register()
    {
        // return view('auth.register');
        return view('register.index');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'role' => 'required|in:user'
        ]);

        $data = [
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'role' => $validatedData['role']
        ];

        User::create($data);
        return redirect('/login');
    }

    protected $redirectTo = '/';
    public function index()
    {
        // return view('auth.login');
        return view('login.index');
    }

    public function authenticate(Request $request)
    {
        $data = $request->user();
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // $user = User::where('email', $credentials['email'])->first();
        $user = Auth::user();



        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();

            if ($user->role === 'admin') {

                return redirect()->intended('/dashboard');
            }

            return redirect()->intended('/');
        }

        return back()->with('loginError', 'Login Failed!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->Session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
