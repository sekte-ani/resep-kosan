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
    public function cemilan()
    {
        return view('cemilan/index');
    }
}
