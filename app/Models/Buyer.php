<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buyer extends User
{
    use HasFactory;

    /**
     * Boot method
     */
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('buyer', function ($query) {
            return $query->has('transactions');
        });
    }

    /**
     * Transactions of the user
     */
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
