<?php

namespace App\Http\Middleware;

use App\Permission;
use App\PermissionRole;
use App\Range;
use App\Role;
use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        $result = false;
        $permission = Permission::where('label', session('page'))->first();
        $roleId = Role::where('name', Auth::user()->role)->first();
        $permissionRoles = PermissionRole::where('role_id', $roleId->id)->get();

        foreach ($permissionRoles as $permissionRole){
            if($permissionRole->permission_id == $permission->id) {
                $result = true;
                break;
            }
        }

        if($result)
            return $response;
        else
            return abort(403);


    }
}
