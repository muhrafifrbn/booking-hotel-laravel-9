<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;

class FasilitasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("Dashboard.tambah-fasilitas");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasiData = $request->validate([
            "nama" => ["required"],
            "keterangan" => ["required"],
            "slug" => ["required", "unique:fasilitas"],
            "foto" => ["image"],
        ]);

        if($request->file("foto")){
           $validasiData["foto"] =  $request->file("foto")->store("foto-fasilitas");
        }

       Fasilitas::create($validasiData);
       
       return \redirect("/dashboard")->with("sukses", "Data Fasilitas Berhasil Ditambahkan");
    }

    /**
     * Display the specified resource.
     */
    public function show(Fasilitas $fasilita)
    {
        return view("Dashboard.detail-fasilitas", ["fasilitas" => $fasilita]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fasilitas $fasilita)
    {
        return view('Dashboard.edit-fasilitas', ["fasilitas"=> $fasilita]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fasilitas $fasilita)
    {
     $validasiData = [
        "nama" => ['required'],
        "slug" => ["required"],
        "keterangan" => ["required"],
        "foto" => ["image","max:1024"]
     ];

     if($request->slug != $fasilita->slug){
        $validasiData["slug"] = ["required", "unique:fasilitas"];
     } 

     $validasiData = $request->validate($validasiData);

     if($request->file("foto")){
        if($fasilita->foto != null){
            Storage::delete($fasilita->foto);
        }
        $validasiData["foto"] = $request->file('foto')->store("foto-fasilitas");
     }

        Fasilitas::where("id", $fasilita->id)->update($validasiData);

        return \redirect("/dashboard")->with("sukses", "Data Fasilitas Berhasil Diubah");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fasilitas $fasilita)
    {
        if($fasilita->foto != null){
            Storage::delete($fasilita->foto);
        }
        Fasilitas::destroy($fasilita->id);

        return redirect("/dashboard")->with("sukses", "Hapus Data Fasilitas Berhasil");
    }

    public function checkSlug(Request $req){
        $slug = SlugService::createSlug(Fasilitas::class, 'slug', $req->nama);
        return response()->json(['slug' => $slug]);
    }
}
