<?php

use App\Models\Kamar;
use App\Models\User;
use App\Models\Pemesanan;
use App\Models\Fasilitas;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TesterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Gate;


// START TESTER
Route::get("/tester", [TesterController::class, "index"]);
Route::get("/tester/form", [TesterController::class, "create"]);
Route::post("/tester/form", [TesterController::class, "store"]);
Route::get("/tester/hapus", [TesterController::class, "hapus"]);
// END TESTER

Route::get('/', function () {

        if(Auth()->user()){
            $user = User::find(Auth()->user()->id);
            return view("index", 
            ["kamar"=> Kamar::all(), 
            "user" => $user,
            "fasilitas" => Fasilitas::all(),
        ]);
        }    

    return view("index", ["kamar"=> Kamar::all(), "fasilitas" => Fasilitas::all()]);
})->name("utama");

// START ROUTE LOGIN
Route::get("/login",[LoginController::class, 'index'])->middleware("guest")->name("login");
Route::post("/login",[LoginController::class, 'login']);
Route::post("/logout", [loginController::class, "logout"]);
// END ROUTE LOGIN

// START ROUTE REGISTRASI
Route::get("/registrasi",[RegistrasiController::class, 'index'])->middleware("guest");
Route::post("/registrasi",[RegistrasiController::class, 'store'])->name("registrasi");
// END ROUTE REGISTRASI

// START DASHBOARD ADMIN KAMAR
Route::middleware(['auth', "isAdmin"])->group(function () {
    
    Route::get("/dashboard/checkSlug", [DashboardController::class, "checkSlug"]);

    Route::get("/dashboard", [DashboardController::class, "index"]);

    Route::get("/dashboard/create", [DashboardController::class, "create"])->name("tambah.kamar");

    Route::post("/dashboard/store", [DashboardController::class, "store"]);

    Route::get("/dashboard/detail/{kamar:slug}", [DashboardController::class, "show"]);

    Route::get("/dashboard/edit/{kamar:slug}", [DashboardController::class, "edit"]);

    Route::put("/dashboard/update/{kamar:slug}", [DashboardController::class, "update"]);

    Route::delete("/dashboard/hapus/{kamar:slug}", [DashboardController::class, "destroy"]);
});
// END DASHBOARD ADMIN KAMAR

// START DASHBOARD ADMIN FASILITAS
Route::get("/dashboard/fasilitas/checkSlug", [FasilitasController::class, "checkSlug"]);
Route::resource('/dashboard/fasilitas', FasilitasController::class)->except("index")->middleware(["auth", "isAdmin"]);
// END DASHBOARD ADMIN FASILITAS

// START PEMESANANAN KAMAR
Route::controller(PemesananController::class)->middleware(["auth", "isUser"])->group(function(){
    Route::get("/pemesanan", "index")->middleware("auth");
    Route::post("/pemesanan", "store")->middleware("auth");
    Route::get("/pemesanan/{pesan}/show", "show")->middleware("auth")->name("pemesanan.show");
    Route::get("/pemesanan/edit", "edit")->middleware("auth")->name("pemesanan.edit");
    Route::get("/pemesanan/update", "update")->middleware("auth")->name("pemesanan.update");
    Route::delete("/pemesanan/{pesan}/hapus", "destroy")->middleware("auth")->name("pemesanan.destroy");
});
Route::post("/pemesanan/{pesan}/transaksi", [TransaksiController::class, "store"])->middleware(["auth", "isUser"])->name("pemesanan.transaksi");
// END  PEMESANANAN KAMAR

// START RESEPSIONIS KAMAR DAN DATA TRANSAKSI
Route::middleware(["auth", "isResepsionis"])->controller(TransaksiController::class)->group(function(){
    Route::get("/resepsionis", "index");
    Route::post("/pemesanan/{pesan}/konfirmasi", "konfirmasi")->middleware("auth")->name("pemesanan.konfirmasi");
});
// END RESEPSIONIS KAMAR DAN DATA TRANSAKSI