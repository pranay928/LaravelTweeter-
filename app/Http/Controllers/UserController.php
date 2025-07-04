<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function home()
    {
        if(Auth::check())
        {
            return view('welcome');
        }
        else 
        {
        return view('auth/login');
       
        }

    } 

    public function register(){

        return view('auth/register');

    }


    public function login()
    {

        return view('auth/login');

    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success','You are logged out successfully!');

       
    }

    // public function registerSave(Request $request){

    //    $user = $request->validate([
    //         'name'=> 'required',
    //         'email'=>'required|email',
    //         'age'=>'required',
    //         'password'=> 'required|confirmed|min:6',           
            
    //     ]);  

    //     if($user->fail()) {

    //         return redirect()->back()->withErrors($user)->withinput();

    //     }

    //     $users = User::create($user);
    //     $users->name = $user['name'];
    //     $users->email = $user['email'];
    //     $users->age = $user['age'];
    //     $users->password = Hash::make($user['password']);
    //     $users->save();



    //     return redirect()->route('login'); 
        
        

          

    // }


    public function registerSave(Request $request) 
    {
            $validation = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'age' => 'required',
                'password' => 'required|confirmed|min:6',
            ]);

            if ($validation->fails()) {
                return  redirect()->back()->withErrors($validation)->withInput();
            }

            

        $membership = new User();        
        $membership->name = $request->input('name');
        $membership->email = $request->input('email');
        $membership->age = $request->input('age');
        $membership->password = Hash::make($request->input('password'));
       
        $membership->save();


        return redirect()->route('login')->with('error', [
                'status' => 'success',
                'title' => 'Membership created',
                'description' => 'The Membership is successfully created.'
            ]);
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
