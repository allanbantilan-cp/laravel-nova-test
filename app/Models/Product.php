<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Brand;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "name",
        "description",
        "slug",
        "price",
        "quantity",
        "is_published",
    ];

    public function brand() {
       return $this->belongsTo(Brand::class);
    }
}
