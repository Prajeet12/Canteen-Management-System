<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function orderitems()
    {
        return $this->hasMany(OrderItem::class, 'order_id', 'id');

    }

    public function orderOnFood()
    {
        return $this->hasOne(Food::class, 'id', 'category_id');
    }
    public function method()
    {
        return $this->belongsTo(Payment::class, 'method_id', 'id');
    }


}