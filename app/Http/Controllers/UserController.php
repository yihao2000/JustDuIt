<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Auth;
use Redirect;
use Cookie;

class UserController extends Controller
{
    //
    public function showLoginPage(){
        return view('login');
    }
    public function showRegisterPage(){
        return view('register');
    }

    public function register(Request $req){
         //Form Validation
         $this->validate($req, [
            'username' => 'required',
            'email' => 'required|email|unique:users', 
            'password' => 'required|min:3',
            'confirmpassword' => 'required|same:password'
        ]);

        User::create([
            'username' => $req->username,
            'email' => $req->email,
            'password' => Hash::make($req->password),
            'role_id' => 2
        ]);

        return redirect('login');
    }

    public function login(Request $req){
        $this->validate($req, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $remember = $req->has('rememberme');

        $userinfo = [
            'email' => $req['email'],
            'password' => $req['password'],
        ];

        if($remember){
            Cookie::queue('rememberedemail', $req->email, time()+7200);
            Cookie::queue('rememberedpassword', $req->password, time()+7200);
        }else{
            Cookie::queue(Cookie::forget('rememberedemail'));
            Cookie::queue(Cookie::forget('rememberedpassword'));        }

        if (Auth::attempt($userinfo, $remember)) {
            return redirect('home');
        } else {
            if (User::where('email', $req['email'])->exists()) {
                $errors = ['Incorrect password'];
                return redirect('login')->withErrors($errors);
            } else {
                $errors = ['Email isn\'t registered!'];
                return redirect('login')->withErrors($errors);
            }
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('login');
    }
}
