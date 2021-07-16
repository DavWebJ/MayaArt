<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
         protected $guarded = [];
     protected $fillable = [];
    public function order()
    {
        return $this->hasOne(Order::class,'id','order_id');
    }
}
