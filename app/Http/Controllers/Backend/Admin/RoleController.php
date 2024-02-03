<?php

namespace App\Http\Controllers\Backend\Admin;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class RoleController extends Controller
{
    ///////////////// Permission All Controller /////////////
    public function AllPermission()
    {
        $action = 'show';
        $permissions = Permission::all();
        return view('backend.admin.auth.permission.index', compact('permissions', 'action'));
    }

    // end method

    public function AddPermission()
    {
        $action = 'create';
        return view('backend.admin.auth.permission.index', compact('action'));
    }
    // End Method


    public function StorePermission(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'group_name' => 'required',
        ]);

        $action = 'create';
        Permission::create(
            [
                'name' => $request->name,
                'group_name' => $request->group_name,
            ]
        );

        return redirect()->route('all.permission', 'action')->with('update', [
            'type' => 'success',
            'message' => 'Permission Create Successfully.',
        ]);

    }

    // End Method

    public function EditPermission($id)
    {
        $action = 'edit';
        $permission = Permission::find($id);
        return view('backend.admin.auth.permission.index', compact('permission', 'action'));
    }

    // End Method

    public function UpdatePermission(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'group_name' => 'required',
        ]);

        $action = 'edit';
        $per_id = $request->id;
        Permission::find($per_id)->update(
            [
                'name' => $request->name,
                'group_name' => $request->group_name,
            ]
        );

        return redirect()->route('all.permission', 'action')->with('update', [
            'type' => 'success',
            'message' => 'Permission Update Successfully.',
        ]);

    }

    // End Method

    public function DeletePermission($id)
    {
        Permission::find($id)->delete();
        return redirect()->route('all.permission', 'action')->with('update', [
            'type' => 'success',
            'message' => 'Permission Delete Successfully.',
        ]);
    }
    // End Method


    /////////////////------All Roles------------ ////////////////////

    public function AllRoles()
    {
        $action = 'index';
        $roles = Role::where('name', '!=', 'super-admin')->get();
        return view('backend.admin.auth.role.index', compact('roles', 'action'));

    }
    // End Method

    public function AddRole()
    {
        $action = 'create';
        return view('backend.admin.auth.role.index', compact('action'));
    }
    // End Method

    public function StoreRole(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $action = 'create';

        $roleName = $request->name;

        // Check if the role already exists
        if (Role::where('name', $roleName)->where('guard_name', 'web')->exists()) {
            return redirect()->back()->with('update', [
                'type' => 'error',
                'message' => 'Role with the name ' . $roleName . ' already exists.',
            ]);
        }

        // Role doesn't exist, create it
        Role::create([
            'name' => $roleName,
            'guard_name' => 'web', // Specify the guard name if needed
        ]);

        return redirect()->route('all.roles', 'action')->with('update', [
            'type' => 'success',
            'message' => 'Role created successfully.',
        ]);
    }
    // End Method

    public function EditRole($id)
    {
        $action = 'edit';
        $role = Role::find($id);
        return view('backend.admin.auth.role.index', compact('role', 'action'));
    }
    // End Method

    public function UpdateRole(Request $request)
    {
        $action = 'edit';
        $roleId = $request->id;
        $newRoleName = $request->name;

        // Check if the role with the new name already exists
        $existingRole = Role::where('name', $newRoleName)
            ->where('id', '!=', $roleId)
            ->where('guard_name', 'web')
            ->first();

        if ($existingRole) {
            return redirect()->route('all.roles', )->with('update', [
                'type' => 'error',
                'message' => 'Role with the name ' . $newRoleName . ' already exists.',
            ]);
        }

        // Role doesn't exist with the new name, update the role
        Role::find($roleId)->update([
            'name' => $newRoleName,
        ]);

        return redirect()->route('all.roles', 'action')->with('update', [
            'type' => 'success',
            'message' => 'Role updated successfully.',
        ]);
    }
    // End Method

    public function DeleteRole($id)
    {
        $role = Role::find($id);

        // Check if the role is assigned to any user
        if ($role->users()->exists()) {
            return redirect()->back()->with('update', [
                'type' => 'error',
                'message' => 'Cannot delete role. Remove the role from users before deletion.',
            ]);
        }

        // Check if the role is assigned to any permission
        if ($role->permissions()->exists()) {
            return redirect()->back()->with('update', [
                'type' => 'error',
                'message' => 'Cannot delete role. Remove the role from permissions before deletion.',
            ]);
        }

        // No users or permissions are assigned, proceed with deletion
        $role->delete();

        return redirect()->route('all.roles')->with('update', [
            'type' => 'success',
            'message' => 'Role deleted successfully.',
        ]);
    }
    // End Method



    /////////////////////// Add Role Permission All Method //////////////////////

    public function AddRolesPermission()
    {
        $action = 'create';
        $roles = Role::where('name', '!=', 'super-admin')->get();
        $permissions = Permission::all();
        $permission_groups = User::getPermissionGroups();
        return view('backend.admin.auth.rolesetup.index', compact('action', 'roles', 'permission_groups', 'permissions'));
    }
    // End Method

    public function StoreRolesPermission(Request $request)
    {
        // Validate the request
        $request->validate([
            'role_id' => 'required|exists:roles,id',
            'permission' => 'required|array',
            'permission.*' => Rule::exists('permissions', 'id'),
        ], [
            'role_id.required' => 'Please select a role.',
            'permission.required' => 'Please select at least one permission.',
            'permission.*.exists' => 'Invalid permission selected.',
        ]);

        $permissions = $request->permission;
        $role_id = $request->role_id;

        foreach ($permissions as $key => $permission_id) {
            // Check if the entry already exists
            $existingEntry = DB::table('role_has_permissions')
                ->where('role_id', $role_id)
                ->where('permission_id', $permission_id)
                ->first();

            if (!$existingEntry) {
                // If the entry doesn't exist, insert it
                DB::table('role_has_permissions')->insert([
                    'role_id' => $role_id,
                    'permission_id' => $permission_id,
                ]);
            }
        }

        return redirect()->route('all.roles.permission')->with('update', [
            'type' => 'success',
            'message' => 'Permission Assign Successfully in Role',
        ]);
    }

    //End Method

    public function AllRolesPermission()
    {
        $roles = Role::all()->sortBy(function ($role) {
            return ($role->name === 'super-admin') ? 0 : 1;
        });
        $action = 'index';
        return view('backend.admin.auth.rolesetup.index', compact('roles', 'action'));
    } //End Method

    public function EditRolesPermission($id)
    {
        $action = 'edit';
        $role = Role::find($id);
        $permissions = Permission::all();
        $permission_groups = User::getPermissionGroups();
        return view('backend.admin.auth.rolesetup.index', compact('action', 'role', 'permission_groups', 'permissions'));
    } //End Method

    public function UpdateRolesPermission(Request $request)
    {
        $per_id = $request->id;
        $role = Role::find($per_id);
        $permissions = $request->permission;

        if (!empty($permissions)) {
            $role->permissions()->sync($permissions);
        }

        return redirect()->route('all.roles.permission')->with('update', [
            'type' => 'success',
            'message' => 'Permission Update Successfully in Role',
        ]);
    }//End Method

    public function DeleteRolesPermission($id)
    {
        $role = Role::find($id);
        if(!is_null($role)) {
            $role->delete();
        }
        return redirect()->route('all.roles.permission')->with('update', [
            'type' => 'success',
            'message' => 'Permission Delete Successfully in Role',
        ]);
    }

    public function __construct()
    {
        $this->middleware(['role:super-admin']);
    }

}
