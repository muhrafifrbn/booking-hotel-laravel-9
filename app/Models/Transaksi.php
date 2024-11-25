<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pemesanan;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = "transaksi";

    protected $guarded = ["id"];

    public function pemesanan(){
        return $this->belongsTo(Pemesanan::class);
    }
}
