<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_sender_id',
        'company_id',
        'vehicle_id',
        'inside_amman',
        'datetime',
        'sender_price',
        'delivery_price',
        'delivered',
        'approved',
        'canceled',
        'description',
    ];


}
