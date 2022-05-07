<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    const STATUS_DONE = 1;
    const STATUS_DEFAULT = 0;

    protected $fillable = [
        'name',
        'phone',
        'email',
        'address',
        'district',
        'city',
        'note'
    ];

    public function carts() {
        return $this->hasMany(Cart::class, 'customer_id', 'id');
    }
}
