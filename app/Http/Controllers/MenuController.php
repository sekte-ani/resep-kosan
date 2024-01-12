<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Rate;
use App\Models\Category;
use Illuminate\Http\Request;


class MenuController extends Controller
{
    public function dashboard()
    {
        return view('dashboard.index');
    }

    public function makanan()
    {
        $makanan = Menu::with('category')->where('category_id', '=', '1')->paginate(6);
        $menu = Menu::latest();

        if (request('search')) {
            $menu->where('title', 'like', '%' . request('search') . '%');
        }
        return view('makanan.index', [
            'menus' => $makanan,
            'menus2' => $menu->get(),
        ]);
    }

    public function minuman()
    {
        $minuman = Menu::with('category')->where('category_id', '=', '2')->paginate(6);
        $menu = Menu::latest();

        if (request('search')) {
            $menu->where('title', 'like', '%' . request('search') . '%');
        }
        return view('minuman.index', [
            'menus' => $minuman,
            'menus2' => $menu->get(),
        ]);
    }

    public function cemilan()
    {
        $cemilan = Menu::with('category')->where('category_id', '=', '3')->paginate(6);
        $menu = Menu::latest();

        if (request('search')) {
            $menu->where('title', 'like', '%' . request('search') . '%');
        }
        return view('cemilan.index', [
            'menus' => $cemilan,
            'menus2' => $menu->get(),
        ]);
    }

    public function show($title)
    {
        $menu = Menu::where('slug', $title)->first();
        $rate = Rate::with(['user', 'menu'])->take(3)->get();
        return view('makanan.detail', [
            'menus' => $menu,
            'rates' => $rate
        ]);
    }

    public function rate(Request $request)
    {
        $validatedData = $request->validate([
            'rating' => 'required',
            'review' => 'required|max:255',
        ]);

        Rate::create($validatedData);
        return redirect('/');
    }

    public function showMore($title)
    {
        $menu = Menu::where('slug', $title)->first();
        $rate = Rate::with(['user', 'menu'])->paginate(4);
        // return view('rating.index', [
        //     'menus' => $menu,
        //     'rates' => $rate
        // ]);
        return view('makanan.rating', [
            'menus' => $menu,
            'rates' => $rate
        ]);
    }

    public function rateDetail($id)
    {
        $rate = Rate::with(['user', 'menu'])->findOrFail($id);
        return view('rating.detail', [
            'rates' => $rate
        ]);
        return view('rating.detail', [
            'rates' => $rate
        ]);
    }

    public function getAllMenu(Request $request)
    {
        $allMenu = Menu::orderBy('title', 'asc')->paginate(10);

        return view('admin.menu.index', [
            'allMenu' => $allMenu,
        ]);
    }
}
