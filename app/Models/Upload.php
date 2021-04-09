<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    use HasFactory;
    protected $guarded = ['image_up','alt','img_name'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
