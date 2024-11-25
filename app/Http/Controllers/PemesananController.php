<?php

namespace App\Http\Controllers;
use App\Models\Pemesanan;
use App\Models\Kamar;
use App\Rules\ValidasiJumlahKamar;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Transaksi;

class PemesananController extends Controller
{
    public function index(){
        $dataPesan = User::find(Auth()->user()->id);
        return view("Pemesanan.index", ["pemesanan" => $dataPesan->pemesanan]);
    }

    public function store(Request $request){

        $jumlahKamar = Kamar::GetDataKamar($request->kamar_id)->first()->jumlah;
        // return $jumlahKamar->jumlah;
        $validasiData = $request->validate([
            "nama" => ["required" ],
            "cekIn" => ["required","date", "before:cekOut"],
            "kamar_id" => ["numeric", "required"],
            "cekOut" => ["required", "date" ,"after:cekIn"],
            "email" => ["required", "email:dns"],
            "noHp" => ["required"],
            "nama_tamu" => ["required"],
            "jumlah_kamar" => ["required", "max:$jumlahKamar" ,"numeric"],
            "noKtp" => ["required", "unique:pemesanan"],
        ], [
            "jumlah_kamar.max" => "Data kamar hanya tersedia $jumlahKamar",
        ]);
        
       

        $validasiData["user_id"] = Auth()->user()->id;


        // Masukkan Data Pemesanan
       Pemesanan::create($validasiData);


       return \redirect("/pemesanan")->with("sukses", "Pemesanan Berhasil");
    }

    public function show(Pemesanan $pesan){

        if($pesan->user_id != Auth()->user()->id){
            return abort(403);
        }
        
        return view("Pemesanan.detail-pemesanan", ["pemesanan" => $pesan]);
    }

    public function destroy(Pemesanan $pesan){
        
        Pemesanan::destroy($pesan->id);
        return redirect("/pemesanan")->with("sukses", "Data pemesanan berhasil dihapus");
    }
}
