<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Illuminate\Support\Str;
class LoginController extends Controller
{
    public function postlogin(Request $request){
        // dd($request->all());
        if (Auth::attempt($request->only('email' , 'password'))){
            return redirect('admin');
        }
        return redirect('login');
    }

    public function logout(Request $request){
        Auth::logout();
        return redirect('/');
    }

    public function registrasi(){
        return view('pengguna.registrasi');
        
    }

    public function simpanregistrasi(Request $request){
        // dd($request->all());
        User::create([
            'name' => $request->name,
            'level' => $request->level,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(60)

        ]);  
        
        return redirect('login');
    }
    
}
