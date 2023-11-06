<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\permissionStoreRequest;
use App\Http\Requests\permissionUpdateRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:permission list', ['only' => ['index', 'show']]);
        $this->middleware('can:permission create', ['only' => ['create', 'store']]);
        $this->middleware('can:permission edit', ['only' => ['edit', 'update']]);
        $this->middleware('can:permission delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions =  Permission::all();
        return view('admin.permission.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.permission.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(permissionStoreRequest $request)
    {
        Permission::create(['name' => $request->input('name'), 'group_name' => $request->input('group')]);
        return redirect()->route('admin.permissions.index')
                        ->with('alert', ['type' => 'success', 'message' => __('Permission created successfully.')]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Permission $permission)
    {

        return view('admin.permission.show', compact('permission'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Permission $permission)
    {
        return view('admin.permission.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(permissionUpdateRequest $request, Permission $permission)
    {
        $permission->update(['name' => $request->input('name'), 'group_name' => $request->input('group')]);
        return redirect()->route('admin.permissions.index')
        ->with('alert', ['type' => 'success', 'message' => __('Permission updated successfully.')]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();
        return redirect()->route('admin.permissions.index')
                        ->with('alert', ['type' => 'success', 'message' => __('Permission deleted successfully')]);
    }
}
