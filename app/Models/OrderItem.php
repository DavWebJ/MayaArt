<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
     protected $guarded = [];
     protected $fillable = [];
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    public function products()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
}
