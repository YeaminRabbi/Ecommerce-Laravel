<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;
class RoleController extends Controller
{
    function Role()
    {
        // $role = Role::create(['name' => 'Subscriber']);
        // $permission = Permission::create(['name' => 'restore category']);
        return view('backend.role',[
            'roles'=>Role::all(),
            'role_count'=>Role::count(),
            'permissions'=>Permission::all(),
            'permissions_count'=>Permission::count(),
            'users'=>User::all(),
            'user_count'=>User::count()
        ]);
    }


    function RoleAddToPermission(Request $request)
    {
        $role_name = $request->role_name;
        $permission_name = $request->permission_name;

        $role=Role::where('name', $role_name)->first();

        //Assigning Multiple Permission
        $role->givePermissionTo($permission_name);

        //Assinging Single Persmission
        //$role->syncPermissions($permission_name);

        return back();
    }


    function RoleAddToUser(Request $request)
    {
        $user_id = $request->user_id;
        $user=User::findOrFail($user_id);
        $role_name = $request->role_name;
       

        //Assigning Single Role to user
        $user->syncRoles($role_name);

        //Assigning Multiple Roles to user
       // $user->assignRole($role_name);

        return back();
    }


    function PermissionChange($user_id)
    {

        return view('backend.edit_permission',[
            'permissions'=>Permission::all(),
            'user'=>User::findOrFail($user_id)
        ]);
    }

    function PermissionChangeToUser(Request $req)
    {

        $user = User::findOrFail($req->user_id);
        $user->syncPermissions($req->permission);
        return back();
    }
}
