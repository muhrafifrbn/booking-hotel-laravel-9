<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Kamar extends Model
{
    use HasFactory;
    use Sluggable;

    protected $table = "kamar";
    protected $guarded = ["id"];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'type'
            ]
        ];
    }

    public function scopeGetDataKamar($query, $value){
        $query->find($value);
    }
    
}