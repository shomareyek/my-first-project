<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class ChangePasswordController extends Controller
{
    public function __construct(){
        $session = session('page');
        $this->middleware('role:' . $session);
    }

    function ChangePasswordView(){
        session()->flash('page', 'تعویض رمزعبور');
        return view('.layout.pages.change-password');
    }

    function ChangePassword(){
        $validator = Validator::make(request()->all(), [
            'new-password' => 'required|min:8',
            'repassword' => 'required|min:8',
            'password' => 'required|min:8'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }



        if(\request('new-password') != \request('repassword'))
                return back()->withErrors('رمزعبور جدید همخوانی ندارد');
        if(! Hash::check(\request('password'), Auth::user()->password))
            return back()->withErrors('رمزعبور صحیح نمی باشد');
        if(request('new-password') == \request('password'))
            return back()->withErrors('رمزعبور جدید نباید مانند رمزعبور قبلی باشد');

        $user = User::where('name', Auth::user()->name)->first();

        $time = Carbon::now()->diffInHours(Auth::user()->updated_at);
        Carbon::setLocale('fa');
        $ago = Carbon::parse(Auth::user()->updated_at)->diffForHumans();
        if($time <= 24)
            return redirect()->back()->withErrors('برای تغییر رمزعبور باید 24 ساعت بگذرد(شما ' . $ago . " رمزعبور خود را عوض کرده اید)");

        $user->update([
            'password' => bcrypt(\request('new-password'))
        ]);
        return redirect(route('dashboard'));
    }

}
