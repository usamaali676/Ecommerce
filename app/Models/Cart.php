<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Variant;

class Cart extends Model
{
    use HasFactory;
    public function product()
    {
        return $this->belongsTo(Product::class, 'prod_id');
    }
    public function color()
    {
        return $this->belongsTo(Variant::class, 'color_id', 'id');
    }
    public function storage()
    {
        return $this->belongsTo(Variant::class, 'storage_id', 'id');
    }
}
