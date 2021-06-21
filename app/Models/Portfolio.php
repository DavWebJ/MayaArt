<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
        use HasFactory;
    protected $fillable = [];
    protected $guarded = ['created_at','deleted_at','updated_at'];
}
