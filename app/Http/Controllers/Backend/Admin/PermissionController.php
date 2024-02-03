<?php

namespace App\Http\Controllers\Backend\Admin;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:permission-list|permission-create|permission-edit|permission-delete', ['only' => ['index','store']]);
        $this->middleware('permission:permission-create', ['only' => ['create','store']]);
        $this->middleware('permission:permission-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:permission-delete', ['only' => ['destroy']]);
    }


    public function index()
    {
        $permissions = Permission::all();
        $action = 'index';
        return view('backend.admin.auth.permission.index', compact('action', 'permissions'));
    }

    public function create()
    {
        $action = 'create';
        return view('backend.admin.auth.permission.index', compact('action'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate(['name' => ['required', 'min:3']]);
        Permission::create($validated);
        return redirect()->route('admin.permissions.index')->with('success', 'Permission Create Successfully.');
    }

    public function edit(Permission $permission)
    {
        $roles = Role::all();
        $action = 'edit';
        return view('backend.admin.auth.permission.index', compact('action', 'permission', 'roles'));
    }

    public function update(Request $request, Permission $permission)
    {
        $validated = $request->validate(['name' => ['required', 'min:3']]);
        $permission->update($validated);
        return redirect()->route('admin.permissions.index')->with('success', 'Permission Update Successfully.');
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();
        return back()->with('success', 'Permission Deleted Successfully.');
    }

    public function assignRole(Request $request, Permission $permission)
    {

        if($permission->hasRole($request->role)) {
            return back()->with('error', 'Role is Already Exists');
        }
        $permission->assignRole($request->role);
        return back()->with('success', 'Role Added for the Permission.');
    }

    public function removeRole(Permission $permission, Role $role)
    {
        if($permission->hasRole($role)) {
            $permission->removeRole($role);
            return back()->with('success', 'Role Remove from the Permission.');
        }
        return back()->with('error', 'Role didn\'t exists.');
    }


}
