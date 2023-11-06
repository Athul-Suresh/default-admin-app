<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\MenuItems;
use Illuminate\Http\Request;

class MenuItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:menu list', ['only' => ['index', 'show']]);
        $this->middleware('can:menu create', ['only' => ['create', 'store']]);
        $this->middleware('can:menu edit', ['only' => ['edit', 'update']]);
        $this->middleware('can:menu delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Menu $menu)
    {
        $menus = $menu->menuItems;
        return view('admin.menus.items.index', compact('menu', 'menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Menu $menu)
    {
        $item_options = MenuItems::where('menu_id',$menu->id);
        return view('admin.menus.items.create', compact('menu', 'item_options'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Menu $menu)
    {
        $menuItem = MenuItems::create(['name' => 'test', 'uri' => '/']);
        $menuItem->makeChildOf($menu);
        return redirect()->route('admin.menu.items.index')
        ->with('alert', ['type' => 'success', 'message' => __('Menu Item Created successfully')]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function test()
    {

        $menu = Menu::where('name','admin')->first();
        dd($menu->children);

        return redirect()->route('admin.menu.items.index')
        ->with('alert', ['type' => 'success', 'message' => __('Menu Item Created successfully')]);
        
    }


}
