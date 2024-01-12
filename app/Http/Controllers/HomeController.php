<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function dashboard()
    {
        return view('dashboard.index');
    }
    public function makanan()
    {
        return view('makanan/index');
    }
    public function detailMakanan()
    {
        return view('makanan/detail');
    }


    public function minuman()
    {
        return view('minuman/index');
    }
    public function detailMinuman()
    {
        return view('minuman/detail');
    }
    public function cemilan()
    {
        return view('cemilan/index');
    }
    public function detailCemilan()
    {
        return view('cemilan/detail');
    }
    public function login()
    {
        return view('login.index');
    }
    public function register()
    {
        return view('register.index');
    }
}
