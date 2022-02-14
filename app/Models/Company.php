<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone_number', 'address', 'manager_id'];

    public function manager()
    {
        return $this->belongsTo(User::class, 'manager_id', 'id');
    }

    public function vehicles()
    {
        return $this->hasMany(Vehicle::class, 'company_id');
    }

//    protected static function boot()
//    {
//        parent::boot(); // TODO: Change the autogenerated stub
//        static::addGlobalScope();
//    }
}
