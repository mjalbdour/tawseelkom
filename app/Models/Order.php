<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'sender_id',
        'company_id',
        'vehicle_id',
        'inside_amman',
        'datetime',
        'sender_price',
        'delivery_price',
        'delivered',
        'description',
    ];

    public function sender()
    {
        return $this->belongsTo(User::class,"sender_id");
    }

    public function company()
    {
        return $this->belongsTo(Company::class, "company_id");
    }

    public function vehicle()
    {
        return $this->hasOne(Vehicle::class, "id", "vehicle_id");
    }
}
