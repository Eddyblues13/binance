<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Withdrawal extends Model
{
    use HasFactory;

    // Define the fields that are mass assignable
    protected $fillable = [
        'user_id',
        'crypto',
        'wallet',
        'amount',
        'status',
        'transaction_id',
    ];

    // Optionally, define any relationships (e.g., to the User model)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
