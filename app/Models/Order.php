<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'day',
        'hour',
        'people_number',
        'transaction_id',
        'payment_method',
        'amount',
        'user_id',
        'status',
       
    ];
     /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'day' => 'datetime',
        'hour' => 'datetime',
    ];

}
