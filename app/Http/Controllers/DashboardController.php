<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Fasilitas;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("Dashboard.index", [
            "kamars" => Kamar::all(),
            "fasilitas" => Fasilitas::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("Dashboard.tambah");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;
        $validasiData = $request->validate([
            "type" => ["required", "min:5", "unique:kamar"],
            "slug" => ["required", "min:5", "unique:kamar"],
            "jumlah" => ["required", "numeric"],
            "harga" => ["required", "numeric"],
            "status" => ["required"],
            "fasilitas" => ["required", "min:5"],
            "foto" => [ "image", "max:1024"],
        ]);
                                        
        if($request->file("foto")){
            $validasiData["foto"] =  $request->file("foto")->store("foto-kamar");
        }
        
        Kamar::create($validasiData);
        return \redirect("/dashboard")->with("sukses", "Data Berhasil Di tambahkan");

    }

    /**
     * Display the specified resource.
     */
    public function show(Kamar $kamar)
    {   
        // if(Auth()->user()->hak_akses != "admin"){
        //     abort(403);
        // }
        
        return view("Dashboard.detail", ["kamar" => $kamar]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kamar $kamar)
    {
        if(Auth()->user()->hak_akses != "admin"){
            abort(403);
        }
        return view("Dashboard.edit", ["kamar" => $kamar]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kamar $kamar)
    {
        $validasiData = [
            "type" => ["required", "min:5"],
            "slug" => ["required", "min:5"],
            "jumlah" => ["required", "numeric"],
            "harga" => ["required", "numeric"],
            "status" => ["required"],
            "fasilitas" => ["required", "min:5"],
            "foto" => [ "image", "max:1024"],
        ];

        if($request->slug != $kamar->slug){
            $validasiData["slug"] =  ["required", "min:5", "unique:kamar"];
        
        }
        if($request->type != $kamar->type){
            $validasiData["type"] = ["required", "min:5", "unique:kamar"];
        }

        $validasiData = $request->validate($validasiData);

        if($request->file("foto")){
            if($kamar->foto != null){
                Storage::delete($kamar->foto);
            }
            $validasiData["foto"] = $request->file("foto")->store("foto-kamar");
        }

        // return $validasiData;
        Kamar::where("id", $kamar->id)->update($validasiData);

        return redirect("/dashboard")->with("sukses", "Edit data berhasil");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kamar $kamar)
    {
        if($kamar->foto){
            Storage::delete($kamar->foto);
        }

        Kamar::destroy($kamar->id);

        return redirect("/dashboard")->with("sukses", "Data Berhasil dihapus");
    }

    public function checkSlug(Request $req){
        $slug = SlugService::createSlug(Kamar::class, 'slug', $req->type);
        return response()->json(['slug' => $slug]);
    }
}
