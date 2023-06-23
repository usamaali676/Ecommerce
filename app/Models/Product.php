<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'category_id', 'slug', 'price', 'description', 'image', 'qty', 'status'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function reviews(){
        return $this->hasMany(Reviews::class, 'prod_id', 'id');
    }
    public function prodimage(){
        return $this->hasMany(ProductImage::class, 'prod_id', 'id');
    }
}
