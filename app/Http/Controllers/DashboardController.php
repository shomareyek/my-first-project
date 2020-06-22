<?php

namespace App\Http\Controllers;
use App\Permission;
use App\PermissionRole;
use App\Role;
use App\User;
use App\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{

    public function __construct(){
        $this->middleware('role');
    }

    protected function Dashboard() {
        \session()->flash('page', 'پنل مدیریت');
        $message = \session()->get('message');
        return view('layout.dashboard')->with('message', $message);
    }

    protected function ActiveSessions(){
        \session()->flash('page', 'نشست های فعال');
        $sessions = Session::all()->where('user_id', Auth::id());
        $sessionMe = Session::where('id', session()->getId())->first();
        return view('layout.pages.table')->with('sessions', $sessions)->with('sessionMe', $sessionMe);
    }

    protected function DeleteSession($id) {
        Session::where('payload', $id)->delete();
        return redirect()->back();
    }

    protected function DataUserView() {
        \session()->flash('page', 'تعویض اطلاعات کاربری');

        $result = \session('result');
        return view('layout.pages.user-data')->with('user', Auth::user())->with('result', $result);
    }

    protected function DataUser(){
        $validator = Validator::make(request()->all(), [
            'email' => 'required|email',
            'username' => 'required',
            'phone' => 'required|min:11',
            'image' => 'required|mimes:jpg,jpeg,png|max:10240'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $user = User::where('email', Auth::user()->email)->first();

        $destination = '/public/assets/media/image/user/';
        if(!is_dir($destination))
        {
            mkdir($destination,0777,true);
        }

        $file = request()->file('image');
        $destinationPath = public_path("/assets/media/image/user/");
        $filename = Auth::user()->id.$file->getClientOriginalName();
        $file->move($destinationPath , $filename);

        $user->update([
            'email' => request('email'),
            'name' => request('username'),
            'phone' => request('phone'),
            'image' => $filename

        ]);
        \session()->flash('result', 'انجام شد');
        return back();
    }

    protected function UsersList(){
        \session()->flash('page', 'کاربران');

        $users = User::all();
        $result = \session('result');
        return view('layout.pages.users')->with('users', $users)->with('result', $result);
    }

    protected function CreatePermissionView(){
        \session()->flash('page', 'ایجاد دسترسی جدید');

        $result = \session('result');
        $permissions = Permission::all();

        foreach ($permissions as $group)
            $array[] = $group->group;

        $array = array_unique($array);

        return view('layout.pages.create-role', ['result' => $result, 'permissions' => $permissions, 'groups' => $array]);
    }

    protected function CreatePermission(){

        $validator = Validator::make(request()->all(), [
            'role-name' => 'required|unique:App\Role,name',
            'roles' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $role = Role::create([
            'name' => request('role-name')
        ]);

        foreach (request('roles') as $permission){
            PermissionRole::create([
                'role_id' => $role->id,
                'permission_id' => $permission
            ]);
        }



        \session()->flash('result', 'انجام شد');
        return back();

    }

    protected function EditUserView($id){
        \session()->flash('page', 'تغییر دسترسی کاربر');

        $roles = Role::all();
        $user = User::where('id', $id)->first();
        if($user == null)
            return abort(404);
        else
            return view('layout.pages.edit-user')->with('user', $user)->with('roles', $roles);
    }

    protected function EditUser($id){
        $user = User::find($id);

        if ($user == null)
            return abort(404);

        if($user == null)
            return redirect()->back()->withErrors('کاربر مورد نظر یافت نشد');
        else{
            $user->update([
                'role' => request('role')
            ]);
            \session()->flash('result', 'انجام شد');
            return redirect(route('users'));
        }
    }

    protected function RoleList(){
        \session()->flash('page', 'دسترسی ها');
        $result = \session('message');
        $roles = Role::all();
        $permissionRoles = PermissionRole::all();
        return view('layout.pages.roles', ['roles' => $roles, 'permissionRoles' => $permissionRoles, 'result' => $result]);
    }

    protected function EditRoleView($id){
        $diffs = null;
        $result = true;
        \session()->flash('page', 'ویرایش دسترسی');

        $role = Role::where('id' , $id)->first();

        if ($role == null)
            return abort(404);

        $permissionRoles = GetSidebar($role->name);

        $permissions = Permission::all();

        foreach ($permissions as $group)
            $array[] = $group->group;

        $array = array_unique($array);

        foreach ($permissions as $permission) {
            foreach ($permissionRoles as $permissionRole){
                if($permission->id == $permissionRole->id) {
                    $result = false;
                    break;
                }else
                    $result = true;
            }
            if ($result)
                $diffs[] = $permission;
        }

        return view('layout.pages.edit-role', ['result' => \session('result'), 'diffs' => $diffs, 'role' => $role, 'permissionRoles' => $permissionRoles, 'groups' => $array]);
    }

    protected function EditRole($id){
        $validator = Validator::make(request()->all(), [
            'role-name' => 'required',
            'roles' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        PermissionRole::where('role_id', $id)->delete();

        $role = Role::where('id', $id)->first();
        if ($role == null)
            return abort(404);

        $role->update([
            'name' => request('role-name')
        ]);

        foreach (request('roles') as $permission){
            PermissionRole::create([
                'role_id' => $id,
                'permission_id' => $permission
            ]);
        }

        \session()->flash('result', 'انجام شد');
        return back();
    }

    protected function DeleteRole($id){
        $role = Role::where('id', $id)->first();
        if($role != null){
            Role::where('id', $id)->delete();
            PermissionRole::where('role_id', $id)->delete();
            return back();
        }
        return back()->withErrors('دسترسی مورد نظر یافت نشد');
    }
}
