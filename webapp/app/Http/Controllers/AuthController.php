<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Session\Session;

class AuthController extends Controller
{
    //
    public function loginView(){
        if(Auth::check()){
            return redirect(route('home'));
        }
        return view('login');
    }

    public function registerView(){
        // if(Auth::check()){
        //     return redirect(route('home'));
        // }
        return view('register');
    }

    public function registerAction(Request $request){
        $request->validate([

            'name'=>'required',
            'email'=>'required',
            'password' => 'required'
        ]);

        $user = User::create([
            
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        if(!$user){
            return redirect(route('register'))->with("error", "Please fill up all the available fields");
        }
        else{
            if(Auth::attempt($request->only('email', 'password'))){
                return redirect(route('completeprofile'));
            }
            
        }
    }

    public function loginAction(Request $request){

        $request->validate([
            'email' => 'required',
            'password' => 'required'

        ]);

        if(Auth::attempt($request->only('email', 'password'))){
            return redirect(route('home'));
        }
        else
        {
            return redirect(route('login'))->with("error", "Wrong credentials");
        }

    }

    public function logout(){
        
        Auth::logout();
        
        return  redirect(route('login'))->header('Cache-Control', 'no-cache, no-store, max-age=0, must-revalidate')
        ->header('Pragma', 'no-cache')
        ->header('Expires', 'Fri, 01 Jan 1990 00:00:00 GMT');
    }
}
