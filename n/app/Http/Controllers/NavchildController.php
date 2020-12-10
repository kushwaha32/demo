<?php

namespace App\Http\Controllers;

use App\Models\Navchild;
use Illuminate\Http\Request;


class NavchildController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $navs = Navchild::paginate(5);
        return view('admin.navchild.index', compact('navs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.navchild.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
      
        $nch = Navchild::all();
        $request->validate([
           'nvparent' => 'required|string',
           'nvchild'  => 'required|string|unique:navchildren,nvchild'
        ]);
        $navchild = new Navchild;
        $navchild->nvparent = $request->nvparent;
        $navchild->nvchild = $request->nvchild;
        $navchild = $navchild->save();
        return back()->with('message', 'child created successfully');
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Navchild  $navchild
     * @return \Illuminate\Http\Response
     */
    public function show(Navchild $navchild)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Navchild  $navchild
     * @return \Illuminate\Http\Response
     */
    public function edit(Navchild $navchild)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Navchild  $navchild
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Navchild $navchild)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Navchild  $navchild
     * @return \Illuminate\Http\Response
     */
    public function destroy(Navchild $navchild)
    {
        //
    }
}
