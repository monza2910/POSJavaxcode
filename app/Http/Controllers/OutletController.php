<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Outlet;

class OutletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $outlets = Outlet::all();
        return view('dashboard.admin.outlet.index',compact('outlets'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.admin.outlet.create');
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
            'telp' => 'nullable|min:5|max:20|integer',
            'whatsapp' => 'nullable|min:5|max:20|integer',
            'instagram' => 'nullable|min:5|max:50',
            'address' => 'required',
            'status' => 'required',       
        ]);

        Outlet::create([
            'name'          => $request->name,
            'telp'          => $request->telp,
            'whatsapp'      => $request->whatsapp,
            'instagram'     => $request->instagram,
            'address'       => $request->address,
            'status'        => $request->status,
        ]);

        return redirect()->route('outlet.index')->with('success','You have successfully added Outlet.');
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
        $outlet = Outlet::findOrFail($id);
        return view('dashboard.admin.outlet.edit',compact('outlet'));

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
            'name' => 'required|min:5|max:100',
            'telp' => 'nullable|min:5|max:20|integer',
            'whatsapp' => 'nullable|min:5|max:20|integer',
            'instagram' => 'nullable|min:5|max:50',
            'address' => 'required',
            'status' => 'required',       
        ]);

        Outlet::where('id',$id)->update([
            'name'          => $request->name,
            'telp'          => $request->telp,
            'whatsapp'      => $request->whatsapp,
            'instagram'     => $request->instagram,
            'address'       => $request->address,
            'status'        => $request->status,
        ]);

        return redirect()->route('outlet.index')->with('success','You have successfully Updated Outlet.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $outlet = Outlet::findOrFail($id);
        $outlet->delete();

        return redirect()->route('outlet.index')->with('success','You have successfully Deleted Outlet.');

    }
}
