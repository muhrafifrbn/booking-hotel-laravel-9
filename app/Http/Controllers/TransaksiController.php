<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemesanan;
use App\Models\Transaksi;
use App\Models\Kamar;

class TransaksiController extends Controller
{
    public function index(){
        return view("Resepsionis.index" , ["pemesanan" => Pemesanan::all()]);
    }

    public function store(Pemesanan $pesan, Request $request){
        $validasiData = $request->validate([
            "nama_bank" => ["required", "in:BCA,Mandiri,BNI"],
            "foto" => ["image"]
        ]);

        if($request->file("foto")){
            $validasiData["foto"] = $request->file('foto')->store("foto-transaksi");
            $validasiData["pemesanan_id"] = $pesan->id;
            Transaksi::create($validasiData);
            
            // Update Data Kamar
            $jumlahKamar = $pesan->kamar->jumlah -  $pesan->jumlah_kamar;
            Kamar::where("id", $pesan->kamar_id)->update(["jumlah" => $jumlahKamar]);
            if($jumlahKamar == 0){
                Kamar::where("id", $pesan->kamar_id)->update(["status" => "Sold"]);
            }

            return \redirect("/pemesanan")->with("sukses", "Pembayaran Berhasil di lakukan");
        }
        return \redirect("/pemesanan")->with("gagal", "Pembayaran Gagal di lakukan");
    }

    public function konfirmasi(Request $request, Pemesanan $pesan){
        Pemesanan::where("id", $pesan->id)->update([
            "status" => true,
        ]);

        return redirect("/resepsionis")->with("sukses", "Konfirmasi Berhasil");

    }
}
