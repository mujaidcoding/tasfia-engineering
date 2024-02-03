<?php

namespace App\Http\Controllers\Backend\Admin;

// use App\Models\User;
// use Illuminate\View\View;
// use Illuminate\Support\Arr;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;
// use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Validation\Rule;

// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\File;
// use Illuminate\Support\Facades\Hash;
// use Illuminate\Http\RedirectResponse;
// use Illuminate\Support\Facades\Password;

class UserController extends Controller
{
    public function AllUser()
    {
        $action = 'index';
        $users = User::where('role', '!=', 'super-admin')->orderBy('created_at')->get();
        return view('backend.admin.auth.users.index', compact('users', 'action'));
    } // End Method

    public function AddUser()
    {
        $action = 'create';
        $roles = Role::all();
        return view('backend.admin.auth.users.index', compact('action', 'roles'));
    }

    public function StoreUser(Request $request)
    {
        // Validation rules
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'new_password' => 'required|min:6',
            'role' => 'nullable|exists:roles,name', // assuming roles are stored in a 'roles' table
            'status' => 'required|in:0,1',
        ];

        // Custom validation messages
        $messages = [
            'role.exists' => 'The selected role does not exist.', // Custom message for role validation
        ];

        // Validate the request
        $validatedData = $request->validate($rules, $messages);

        // Create and save the user
        $user = new User();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['new_password']);
        $user->status = $validatedData['status'];
        $user->save();

        // Assign role if provided
        if ($validatedData['role']) {
            $user->assignRole($validatedData['role']);
        }

        // Redirect with success message
        return redirect()->route('all.user')->with('update', [
            'type' => 'success',
            'message' => 'User created successfully.',
        ]);
    } //End Method

    public function EditUser($id)
    {
        $action = 'edit';
        $user = User::find($id);
        $roles = Role::all();
        return view('backend.admin.auth.users.index', compact('action', 'user', 'roles'));
    }

    public function UpdateUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $request->id,
            'new_password' => 'nullable|string|min:8|confirmed',
            'role' => 'nullable|string', // Add your role validation rules if needed
            'status' => 'required|boolean',
        ]);

        $user = User::find($request->id);

        if (!$user) {
            // Handle case where user is not found
            return redirect()->route('all.user')->with('update', [
                'type' => 'error',
                'message' => 'User not found.',
            ]);
        }

        $user->name = $request->name;
        $user->email = $request->email;

        // Only update password if a new password is provided
        if ($request->filled('new_password')) {
            $user->password = Hash::make($request->new_password);
        }

        // Check if 'role' is present in the request before updating
        if ($request->filled('role')) {
            $user->role = $request->role;
            $user->roles()->detach();
            $user->assignRole($request->role);
        }

        $user->status = $request->status;
        $user->save();

        return redirect()->route('all.user')->with('update', [
            'type' => 'success',
            'message' => 'User Update Successfully.',
        ]);
    }

    //End Method

    public function updateUserStatus($id)
    {
        $user = User::find($id);
        $user->status = $user->status === 1 ? 0 : 1;
        $user->save();
        return redirect()->route('all.user')->with('update', [
            'type' => 'success',
            'message' => 'User Status Changed.',
        ]);
    }

    public function DeleteUser($id)
    {
        $user = User::find($id);

        if(!is_null($user)) {
            $user->delete();
        }

        return redirect()->route('all.user')->with('update', [
            'type' => 'success',
            'message' => 'User Delete Successfully.',
        ]);
    }

    public function __construct()
    {
        $this->middleware(['role:super-admin']);
    }

}
