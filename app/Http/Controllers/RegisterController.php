<?php

namespace App\Http\Controllers;

use App\Http\Requests\registerRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //
    public function show(){
        // dd('hello');
        return view('auth.register');
    }

    public function register(registerRequest $request){
        // dd($request) ;
        $user = User::create(
            [
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password)
            ]);
            auth()->login($user);
            return redirect('/')->with('success','Account created successfully');

    }

}
