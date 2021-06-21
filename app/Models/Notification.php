<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $guarded = ['created_at','updated_at','published_at','message'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
