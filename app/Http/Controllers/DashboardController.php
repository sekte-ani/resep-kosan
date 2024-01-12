<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardController extends Controller
{

    public function getAllMenu(Request $request)
    {
        $allMenu = Menu::orderBy('updated_at', 'desc')->paginate(10);

        return view('admin.menu.index', [
            'allMenu' => $allMenu,
        ]);
    }

    public function create()
    {
        return view('admin/menu/modal/index');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'desc' => 'required',
            'img' => 'image|file|max:5120',
            'category_id' => 'required',
        ]);
        
        if($request->file('img')){
            $validatedData['img'] = $request->file('img')->store('post-images');
        }
        
        Menu::create($validatedData);
        return redirect('/dashboard-menu');
    }

    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Menu::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }

    public function update(Request $request, $id){
        $validatedData = $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'desc' => 'required',
            'img' => 'sometimes|file',
            'category_id' => 'required',
        ]);

        $menu = Menu::findOrFail($id);

        $menu->title = $validatedData['title'];
        $menu->desc = $validatedData['desc'];
        $menu->img = $validatedData['img'];
        $menu->category_id = $validatedData['category_id'];
        if ($request->hasFile('menu')) {
            $uploadedFile = $request->file('menu');
            $newFileName = time() . '_' . $uploadedFile->getClientOriginalName();
            $uploadedFile->storeAs('path_to_store', $newFileName); // Adjust the path

            // Update the menu item with the new file path
            $menu->menu = 'path_to_store/' . $newFileName; // Adjust the path
        }

        $menu->save();
        return redirect('/dashboard-menu');

    }
}
