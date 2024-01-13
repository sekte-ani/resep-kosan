<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Rate;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class MenuController extends Controller
{

    public function dashboard()
    {
        return view('dashboard.index');
    }

    public function makanan()
    {
        $makanan = Menu::with('category')->where('category_id', '=', '1')->latest()->paginate(6);
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
        $minuman = Menu::with('category')->where('category_id', '=', '2')->latest()->paginate(6);
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
        $cemilan = Menu::with('category')->where('category_id', '=', '3')->latest()->paginate(6);
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

        

        $rate = Rate::where('menu_id', $menu->id)->with(['user', 'menu'])->latest()->take(3)->get();
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
            'menu_id' => 'required|exists:menus,id'
        ]);

        $user_id = Auth::id();

        $validatedData['user_id'] = $user_id;

        Rate::create($validatedData);

        return redirect('/makanan');
    }
    public function showMore($title)
    {
        $menu = Menu::where('slug', $title)->first();
        $rate = Rate::where('menu_id', $menu->id)->with(['user', 'menu'])->latest()->paginate(4);
        // return view('rating.index', [
        //     'menus' => $menu,
        //     'rates' => $rate
        // ]);
        return view('makanan.rating', [
            'menus' => $menu,
            'rates' => $rate,
            'coba' => $title
        ]);
    }

    public function rateDetail($id)
    {
        $rate = Rate::with(['user', 'menu'])->findOrFail($id);
        return view('rating.detail', [
            'rates' => $rate
        ]);

    }

    public function search()
    {
        $menu = Menu::latest();

        if (request('search')) {
            $menu->where('title', 'like', '%' . request('search') . '%');
        }

        return view('dashboard.search', [
            'menus' => $menu->get(),
        ]);
    }
}
