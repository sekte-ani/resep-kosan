<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function getAllMenu(Request $request)
    {
        $allMenu = Menu::orderBy('updated_at', 'asc')->paginate(10);

        return view('admin.menu.index', [
            'allMenu' => $allMenu,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'desc' => 'required',
            'img' => 'required',
            'category_id' => 'required',
        ]);
        $menu = Menu::create([
            'title' => $validatedData['title'],
            'slug' => $validatedData['slug'],
            'desc' => $validatedData['desc'],
            'img' => $validatedData['img'],
            'category_id' => $validatedData['category_id'],
        ]);
        
        Menu::create($menu);
        return redirect('/dashboard-menu');
    }

    public function update(Request $request, $id){
        $validatedData = $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'desc' => 'required',
            'img' => 'required',
            'category_id' => 'required',
        ]);

        $menu = Menu::findOrFail($id);

        $menu->update($validatedData);
        return redirect('/dashboard-menu');

    }
}
