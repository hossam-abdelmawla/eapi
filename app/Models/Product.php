<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Redis;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'detail', 'price', 'stock', 'discount'];

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
