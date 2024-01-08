<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payments'; // Define your table name here

    protected $fillable = [
        'method',
        // Add other fillable fields here
    ];

    // Define any relationships if needed
    // For example, if Payment belongs to a certain Order:
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
