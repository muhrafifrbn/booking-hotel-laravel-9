<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\TesterRequest;
use Illuminate\Support\Facades\Gate;
use App\Models\Pemesanan;

class TesterController extends Controller
{
    public function index(){

        // if(Gate::allows("admin") ){
        //     return "Punya Akses";
        // } 
        
        // return \abort(403, "Halaman Tidak bisa diakses")
        return \view("tester");
    }

    public function create(){
        return view("tester-form");
    }

    public function store(Request $req){
        // $validasi = $req->validate([
        //     "data_masuk" => ["before:data_keluar"],
        //     "data_keluar" => ["after:data_masuk"] ,
        // ]);
        // $validasi = $req->validated();

        return "qwqw";
    }

    public function hapus(Request $req){
        return Pemesanan::where("id", $req->id)->update(["email"=>"anjay@gmail.com"]);
    }
}
