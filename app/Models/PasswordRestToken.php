<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PasswordResetToken extends Model
{
    protected $fillable = ['user_id', 'token'];

    // Define relationships if necessary
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

