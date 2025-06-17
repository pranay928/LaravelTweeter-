<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(){

        return view('auth/register');

    }

    public function login()
    {

        return view('auth/login');

    }

    public function registerSave(Request $request){

       $user = $request->validate([
            'name'=> 'required',
            'email'=>'required|email',
            'age'=>'required',
            'password'=> 'required|confirmed|min:6',           
            
        ]);  

        $users = User::create($user);
        $users->name = $user['name'];
        $users->email = $user['email'];
        $users->age = $user['age'];
        $users->password = Hash::make($user['password']);
        $users->save();

        return redirect()->route('login');     
          

    }

    public function loginAuth(Request $login)
    {
        $credentials = $login->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if (Auth::attempt([
            'email' => $credentials['email'],
            'password' => $credentials['password'],
        ])) {
            // $login->session()->regenerate(); // optional but recommended
            return redirect()->route('home')->with('success', 'Welcome to dashboard');
        } else {
            return redirect()->route('login')->with('error', 'Invalid Credentials');
        }
    }
}
