<?php

namespace App\Http\Controllers;

use App\CreateActive;
use App\UserActive;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\ThrottlesLogins;

use Illuminate\Support\Facades\Validator;


class LoginController extends Controller
{

    protected function LoginView(){
        if(Auth::check() == false)
            return view('layout.pages.login.login');
        else
            return redirect(route('dashboard'));
    }

    protected function Login(){
        $vars = array(
            'secret' => env('RECAPTCHA_SECRET'),
            "response" => \request('recaptcha_v3')
        );
        $url = "https://www.google.com/recaptcha/api/siteverify";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $vars);
        $encoded_response = curl_exec($ch);
        $response = json_decode($encoded_response, true);
        curl_close($ch);
        if($response['success'] && $response['action'] == 'login' && $response['score']>0.4) {
            $validator = Validator::make(request()->all(), [
                'email' => 'required|email',
                'password' => 'required|min:8'
            ]);

            if ($validator->fails()) {
                return redirect(route('login'))->withErrors($validator)->withInput();
            }

            if(Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
                \session(['email' => request('email'), 'password' => request('password')]);
                Auth::logout();
                return redirect('phone-num');
            }else
                return redirect()->back()->withErrors('پست الکترونیک یا رمز عبور صحیح نمی باشد')->withInput();
        }else {
            return back()->withErrors('ریکپچا گوگل شما را به عنوان یک ربات تشخیص داده است');
        }
    }

    protected function PhoneNumView(){
        if(\session('email') == null && \session('password') == null)
            return redirect(route('login'));

        return view('layout.pages.login.phone-num');
    }

    protected function PhoneNum(){
        $validator = Validator::make(request()->all(), [
            'phone-num' => 'required|min:11',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $email = session('email');
        $password = session('password');

            if (Auth::validate(['email' => $email, 'password' => $password, 'phone' => request('phone-num')])) {
                session(['phone' => request('phone-num')]);
                if (request('remember') == "on")
                    session(['remember', true]);
                else
                    session(['remember', false]);

                $code = rand(100000, 999999);
                cookie()->queue('code', $code, 2);
//                require 'C:\Users\Sepco\Desktop\project\login\vendor\autoload.php';
//                $sender = "1000596446";
//                $receptor = session('phone');
//                $message = "کد تایید شما: " . $code;
//                $api = new \Kavenegar\KavenegarApi("616871724F53767A5534476E7530366C6854627A46736846657449434C5346654A364E61357859394E356B3D");
//                $api->Send($sender, $receptor, $message);

                return redirect(route('verify'));
            }

            return redirect()->back()->withErrors('شماره تلفن صحیح نمی باشد')->withInput();
    }

    protected function VerifyView(){
        if(request()->cookie('code') == null)
            return redirect(route('phone-num'));
        return view('layout.pages.login.verify');
    }

    protected function Verify(){
//        $code = request()->cookie('code');
//        if($code == null)
//            return redirect(route('login'));
//        if(request('code') == null)
//            return redirect()->back()->withErrors('باید قسمت کد تایید را پر کنید');
//
//        if(request('code') == $code) {
//
//            $ip = request()->ip();
//            require 'C:\Users\Sepco\Desktop\project\login\vendor\autoload.php';
//            cookie()->queue('code', $code, 2);
//            $sender = "1000596446";
//            $receptor = $user->phone_num;
//            $message = "شما با آیپی " . $ip . " وارد اکانت " . $user->username . "شدید.";
//            $api = new \Kavenegar\KavenegarApi("616871724F53767A5534476E7530366C6854627A46736846657449434C5346654A364E61357859394E356B3D");
//            $api->Send($sender, $receptor, $message);
//
            session()->flash('message', true);
            if(session('remember')) {
                Auth::attempt(['email' => \session('email'), 'password' => \session('password')], true);
            }else {
                Auth::attempt(['email' => \session('email'), 'password' => \session('password')]);
            }
            cookie()->queue(cookie()->forget('code'));
            session()->forget('id');
            session()->forget('phone');
            return redirect(route('dashboard'));
//        }else{
//            return redirect()->back()->withErrors('کد تایید وارد شده صحیح نمی باشد');
//        }
    }

    protected function ReSend(){
        if(session('phone') == null) {
            return redirect(route('login'));
        }

        $code = rand(100000, 999999);
        require 'C:\Users\Sepco\Desktop\project\login\vendor\autoload.php';
        cookie()->queue('code', $code, 2);
        $sender = "1000596446";
        $receptor = session('phone');
        $message = "کد تایید شما: " . $code;
        $api = new \Kavenegar\KavenegarApi("616871724F53767A5534476E7530366C6854627A46736846657449434C5346654A364E61357859394E356B3D");
        $api->Send($sender, $receptor, $message);

        return redirect(route('verify'));
    }

    protected function Logout(){
        Auth::logout();
        return redirect('login');
    }


}
