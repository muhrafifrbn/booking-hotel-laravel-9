<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("login");
    }

    public function login(Request $req){
        $validasiData = $req->validate([
            "username" => ["required"],
            "password" => ["required"]
        ]);

        if(Auth::attempt($validasiData)){
            $req->session()->regenerate();
            
            if(Gate::allows("admin")){
                return \redirect()->intended("/dashboard");
            }
            return \redirect()->intended("/");
           
        }

        return \redirect("/login")->with("gagal", "Gagal Login");
    }

    public function logout(Request $req){
        Auth::logout();
        $req->session()->invalidate();
        $req->session()->regenerateToken();
        return redirect("/");
    }
   
  
}
