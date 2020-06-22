<?php

namespace App\Http\Controllers;

use App\Mail\RecoveryMail;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Hash;

class RecoveryController extends Controller
{

    protected function RecoveryWay()
    {
        if(Auth::check())
            return redirect(route('dashboard'));
        else
            return view('layout.pages.recovery.recovery-way');
    }

    protected function RecoveryPhoneView()
    {
        if(Auth::check())
            return redirect(route('dashboard'));
        return view('layout.pages.recovery.recovery-phone');
    }

    protected function RecoveryPhone()
    {
        $validator = Validator::make(request()->all(), [
            'phone-num' => 'required|min:11|numeric'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::all()->where('phone_num', request('phone-num'))->first();

        if ($user == null)
            return redirect()->back()->withErrors('شماره تلفن وارد شده صحیح نمی باشد')->withInput();

        $time = Carbon::now()->diffInHours($user->updated_at);
        if($time <= 24)
            return redirect()->back()->withErrors('برای تغییر رمزعبور باید 24 ساعت بگذرد(شما ' . $time . " ساعت قبل رمزعبور خود را عوض کرده اید)");

        $pass = PasswordRandom(8);
        $user->update([
            'password' => bcrypt($pass)
        ]);

        require 'C:\Users\Sepco\Desktop\project\login\vendor\autoload.php';
        $sender = "1000596446";
        $receptor = request('phone-num');
        $message = "رمزعبور شما تغییر کرد" . "\n" . "نام کاربری: " . $user->username . "\n" .  "رمز عبور: " . $pass;
        $api = new \Kavenegar\KavenegarApi("616871724F53767A5534476E7530366C6854627A46736846657449434C5346654A364E61357859394E356B3D");
        $api->Send($sender, $receptor, $message);

        session()->flash('change-pass', 'رمز عبور شما تغییر یافت');
        return redirect(route('login'));

    }

    protected function RecoveryEmailView()
    {
        if(Auth::check())
            return redirect(route('dashboard'));
        return view('layout.pages.recovery.recovery-email');
    }

    protected function RecoveryEmail()
    {
        $validator = Validator::make(request()->all(), [
            'email' => 'required|email'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::all()->where('email', request('email'))->first();

        if ($user == null)
            return redirect()->back()->withErrors('پست الکترونیکی وارد شده صحیح نمی باشد');

        $time = Carbon::now()->diffInHours($user->updated_at);
        Carbon::setLocale('fa');
        $ago = Carbon::parse($time)->diffForHumans();
        if($time <= 24)
            return redirect()->back()->withErrors('برای تغییر رمزعبور باید 24 ساعت بگذرد(شما ' . $ago . " رمزعبور خود را عوض کرده اید)");

        $pass = PasswordRandom(8);
        $user->update([
            'password' => bcrypt($pass),
        ]);

        Mail::to(request('email'))->send(new RecoveryMail($pass, $user->username));

        session()->flash('change-pass', 'رمز عبور شما تغییر یافت');
        return redirect(route('login'));
    }

}
