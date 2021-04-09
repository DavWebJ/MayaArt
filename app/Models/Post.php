<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Livewire\WithPagination;

class Post extends Model
{
    use HasFactory;

    protected $guarded = ['created_at','updated_at'];

    protected $date = ['published_at'];


    public function postcategory()
    {
        return $this->belongsTo(PostCategory::class,'post_category_id');

    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class)->where('role_id',2);
        
    }

}
