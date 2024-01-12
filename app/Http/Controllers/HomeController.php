<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('dashboard.index', [
            'menus' => Menu::all(),
            'categories' => Category::all()
        ]);
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
