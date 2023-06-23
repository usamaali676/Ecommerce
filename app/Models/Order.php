<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['fname', 'lname', 'email', 'phone', 'country', 'city', 'state', 'zip', 'total_price','status', 'notes', 'tracking_no'];
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
