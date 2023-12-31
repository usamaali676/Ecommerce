<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VariantImages extends Model
{
    use HasFactory;
    protected $fillable = ['image', 'variant_id'];
}
