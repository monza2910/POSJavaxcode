<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Outlet;
use App\Models\Menu;
use App\Models\OutletMenu;

class OutletMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::where('status','1')->get();
        $outletmenus = OutletMenu::all();
        return view('dashboard.admin.outlet_menu.index',compact('menus','outletmenus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'menu_id' => 'required',
            'outlet_id' => 'required',
            'stok' => 'nullable|min:5|max:20|integer',
            'price' => 'required|integer',
            'status' => 'required',       
        ]);

        OutletMenu::create([
            'outlet_id' => $request->outlet_id,
            'menu_id'   => $request->menu_id,
            'stok'      => $request->stok,
            'price'     => $request->price,
            'status'    => $request->status,
        ]);

        return redirect()->route('outletmenu.index')->with('success','You have successfully added Menu to Outlet.');
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
        $outletmenu = OutletMenu::findorfail($id);
        $outlets = Outlet::where('id','!=',$outletmenu['outlet_id'])->get();  

        return view('dashboard.admin.outlet_menu.edit',compact('outlets','outletmenu'));

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
        $request->validate([
            'outlet_id' => 'required',
            'stok' => 'nullable|integer',
            'price' => 'required|integer',
            'status' => 'required',       
        ]);

        OutletMenu::where('id',$id)->update([
            'outlet_id' => $request->outlet_id,
            'stok'      => $request->stok,
            'price'     => $request->price,
            'status'    => $request->status,
        ]);

        return redirect()->route('outletmenu.index')->with('success','You have successfully Updated Menu to Outlet.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $outletmenu = OutletMenu::findorFail($id);
        $outletmenu->delete();
        return redirect()->route('outletmenu.index')->with('success','You have successfully Deleted Menu to Outlet.');

    }

    public function addMenu($id)
    {
        $menu = Menu::findorFail($id);
        $outlets = Outlet::where('status','1')->orderBy('id','desc')->get();
        return view('dashboard.admin.outlet_menu.add',compact('menu','outlets'));
        
        // dd($outlets);
    }

}
