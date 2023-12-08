<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    public function order()
    {
        return $this->belongsTo(Order::class, 'id', 'order_id');


    }

    public function fooditem()
    {
        return $this->belongsTo(Food::class, 'food_id', 'id');


    }
}