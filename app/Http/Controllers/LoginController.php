<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(){
        return view('authentication.login');
    }

    public function loggedIn(Request $request){
        session()->flush();

        $user_name = $request->user_name;
        $password = $request->password;

        $user = Client::where('user_name', $user_name)->first();

        if(!$user){
            return redirect()->back()->withInput()->with('error', 'User cannot be found');
        }

        if(!Hash::check($password, $user->password)){
            return redirect()->back()->withInput()->with('message', 'Password is not correct');
        }

        session(["user_id" => $user->id]);
        return redirect('/admin');
    }

    public function signup(){
        return view('authentication.signup');
    }

    public function register(Request $request){
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'user_name' => 'required|string|max:255|unique:clients',
            'password' => 'required|string|max:255|min:8|confirmed'
        ]);

        $user = new Client();

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->user_name = $request->user_name;
        $user->password = bcrypt($request->password);

        $user->save();

        return redirect()->back()->with('success', 'Registered Successfully');
    }
}
