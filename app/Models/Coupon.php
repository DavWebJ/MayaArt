<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $filliable=['code','percent'];
    public function discount($total)
    {
        return $total  * $this->percent / 100;
 
    }



}
