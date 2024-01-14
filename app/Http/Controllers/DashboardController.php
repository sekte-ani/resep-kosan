<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu;
use App\Models\Rate;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;

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
        return view('admin.menu.modal.index');
    }
    // public function detail()
    // {
    //     return view('admin.menu.modal.detail');
    // }

    public function show(Request $request, Menu $menu){
        // $menu = Menu::where('id', '=', $request);
        
        $rating = Rate::where('menu_id', $menu->id)->paginate(5);
        return view('admin.menu.modal.detail', [
            'menu' => $menu,
            'rating' => $rating,
        ]);
    }
    public function showDetail(Menu $menu){
        
        return view('admin.menu.modal.edit', [
            'menu' => $menu,
            'cat' => Category::all()
        ]);
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

    public function destroy(Menu $menu){
        if($menu->img) {
            Storage::delete($menu->img);
        }
        Menu::destroy($menu->id);
        return  redirect('/dashboard-menu')->with('success', 'Data berhasil terhapus!');
    }

    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Menu::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }


    public function update(Request $request, Menu $menu){
        $validatedData = $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'desc' => 'required',
            'img' => 'image|file|max:5120',
            'category_id' => 'required',
        ]);

        if($request->slug != $menu->slug){
            $rules['slug'] = 'required|unique:posts';
        }

        if($request->file('img')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['img'] = $request->file('img')->store('post-images');
        }

        Menu::where('slug', $menu->slug)->update($validatedData);
        return redirect('/dashboard-menu');

    }
}
