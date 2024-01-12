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

    public function minuman()
    {
        return view('minuman/index');
    }
    public function cemilan()
    {
        return view('cemilan/index');
    }
}
