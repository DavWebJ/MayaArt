<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    use HasFactory;
    protected $guarded = [];
     protected $fillable = [];

     
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function shipping()
    {
        return $this->hasOne(Shipping::class);
    }
    public function transaction()
    {
        return $this->hasOne(Transaction::class);
    }
}
