<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Models\User;
use App\Models\Kamar;
use App\Models\Transaksi;


class Pemesanan extends Model
{
    use HasFactory;
    use Sluggable;

    protected $table = "pemesanan";
    protected $guarded = ["id"];
    protected $with = ["user", "kamar"];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function kamar(){
        return $this->belongsTo(Kamar::class);
    }

    public function transaksi(){
        return $this->hasOne(Transaksi::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'type'
            ]
        ];
    }
}
