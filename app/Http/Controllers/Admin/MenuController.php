<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\menuStoreRequest;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:menu list', ['only' => ['index']]);
        $this->middleware('can:menu create', ['only' => ['create', 'store']]);
        $this->middleware('can:menu edit', ['only' => ['edit', 'update']]);
        $this->middleware('can:menu delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $menus = Menu::all();
     return view('admin.menus.index', compact('menus'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.menus.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(menuStoreRequest $request)
    {
        Menu::create(['name' => $request->input('name'), 'code' => $request->input('code'),'description'=>$request->input('description') ]);
        return redirect()->route('admin.menus.index')
        ->with('alert', ['type' => 'success', 'message' => __('Menu Created successfully')]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        return redirect()->route('admin.menus.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        return view('admin.menus.edit', compact('menu'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
        $menu->update(['name' => $request->input('name'), 'code' => $request->input('code'),'description'=>$request->input('description') ]);
        return redirect()->route('admin.menus.index')
        ->with('alert', ['type' => 'success', 'message' => __('Menu Created successfully')]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect()->route('admin.menus.index')
                        ->with('alert', ['type' => 'success', 'message' => __('Menu deleted successfully')]);
    }
}
