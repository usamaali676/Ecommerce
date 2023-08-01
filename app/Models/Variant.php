<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    use HasFactory;
    protected $fillable = ['prod_id', 'type', 'name', 'price', 'stock', 'color' ];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function variantimage(){
        return $this->hasMany(VariantImages::class, 'variant_id', 'id');
    }
}
