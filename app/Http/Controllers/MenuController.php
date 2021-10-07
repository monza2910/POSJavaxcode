<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Menu;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::all();
        return view('dashboard.admin.menu.index',compact('menus'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $subcategories = SubCategory::all();
        return view('dashboard.admin.menu.create',compact('categories','subcategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|min:5|max:100',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required',
            'subcategory' => 'required',
            'price' => 'required|integer',
            'stok' => 'required|integer',
            'status' => 'required',       
        ]);

        

        $image = time().'.'.$request->image->extension();  
        $imageName = md5($image).'.'.$request->image->extension();
     
        $request->image->move(public_path('images/images_menu'), $imageName);
        $menu = Menu::create([
            'name'          => $request->name,
            'image'         => $imageName,
            'category_id'   => $request->category_id,
            'stok'          => $request->stok,
            'price'         => $request->price,
            'status'        => $request->status,
        ]);
        $menu->subcategory()->attach($request->subcategory);

        return redirect()->route('menu.index')->with('success','You have successfully added menu.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menu   = Menu::findorFail($id);
        $cat_id     = $menu['category_id'];
        $subcategories = SubCategory::orderBy('id','desc')->get();
        $categories = Category::where('id','!=',$cat_id)->get();
        return view('dashboard.admin.menu.edit',compact('categories','subcategories','menu'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        

        $menu = Menu::findorfail($id);

        if ($request->has('image')) {

            $request->validate([
                'name' => 'required|min:5|max:100',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'category_id' => 'required',
                'subcategory' => 'required',
                'price' => 'required|integer',
                'stok' => 'required|integer',
                'status' => 'required',       
            ]);

            $image = time().'.'.$request->image->extension();  
            $imageName = md5($image).'.'.$request->image->extension();
        
            $request->image->move(public_path('images/images_menu'), $imageName);

            $menus = [
                'name'          => $request->name,
                'image'         => $imageName,
                'category_id'   => $request->category_id,
                'stok'          => $request->stok,
                'price'         => $request->price,
                'status'        => $request->status,
            ];
            $menu->subcategory()->sync($request->subcategory);
            $menu->update($menus);

            return redirect()->route('menu.index')->with('success','You have successfully updated Menu.');
    
            
        } else {
            $request->validate([
                'name' => 'required|min:5|max:100',
                'category_id' => 'required',
                'subcategory' => 'required',
                'price' => 'required|integer',
                'stok' => 'required|integer',
                'status' => 'required',       
            ]);
            $menus = [
                'name'          => $request->name,
                'category_id'   => $request->category_id,
                'stok'          => $request->stok,
                'price'         => $request->price,
                'status'        => $request->status,
            ];
            $menu->subcategory()->sync($request->subcategory);
            $menu->update($menus);

            return redirect()->route('menu.index')->with('success','You have successfully updated Menu.');
        }
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menu = Menu::findorFail($id);
        $menu->delete();
        return redirect()->route('menu.index')->with('success','Menu Was Deleted');
    }
}
