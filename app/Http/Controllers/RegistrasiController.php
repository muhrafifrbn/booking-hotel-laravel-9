<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class RegistrasiController extends Controller
{
    public function index(){
        return view("registrasi");
    }

    public function store(Request $req){
        $validasiData = $req->validate([
            "username" => ["required", "min:5", "unique:users"],
            "name" => ["required", "min:5"],
            "email" => ["required", "email:dns", "unique:users"],
            "password" => ["required", "unique:users"]
        ]);

        $validasiData["password"] = Hash::make($validasiData["password"]);

        User::create($validasiData);

        return \redirect("/login")->with("sukses", "Registrasi Berhasil");
    }
}
