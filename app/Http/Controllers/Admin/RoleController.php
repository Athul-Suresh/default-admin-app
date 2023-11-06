<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\roleStoreRequest;
use App\Http\Requests\roleUpdateRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:role list', ['only' => ['index', 'show']]);
        $this->middleware('can:role create', ['only' => ['create', 'store']]);
        $this->middleware('can:role edit', ['only' => ['edit', 'update']]);
        $this->middleware('can:role delete', ['only' => ['destroy']]);
    }


   /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles =  Role::all();
        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions =  Permission::all();
        return view('admin.roles.create',compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(roleStoreRequest $request)
    {
        $role = Role::create($request->all());
        if (! empty($request->permissions)) {
            $role->givePermissionTo($request->permissions);
        }
        return redirect()->route('admin.roles.index')
                        ->with('alert', ['type' => 'success', 'message' => __('Role created successfully.')]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {

        return view('admin.roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        $permissions =  Permission::all();
        return view('admin.roles.edit', compact('role','permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(roleUpdateRequest $request, Role $role)
    {
        $role->update($request->all());
        $permissions = $request->permissions ?? [];
        $role->syncPermissions($permissions);
        return redirect()->route('admin.roles.index')
        ->with('alert', ['type' => 'success', 'message' => __('Role updated successfully.')]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('admin.roles.index')
                        ->with('alert', ['type' => 'success', 'message' => __('Role deleted successfully')]);
    }
}
