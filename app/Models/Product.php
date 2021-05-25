<?php

namespace App\Models;

use Attribute;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [];
    protected $guarded = ['created_at','deleted_at','updated_at'];

    public function images()
    {
        return $this->hasMany(ImageProduct::class,'product_id','id');
    }
    public function FormatPrice()
    {
        $price = $this->price;
        $price_promos = $this->price_promos;

        if($price_promos != 0)
        {
            $price = $price - $price_promos;
            return number_format($price , 2, ',', ' ') . ' €';
        }else{
            return number_format($price, 2, ',', ' ') . ' €';
        }
       
        
    }
    function FraisDePort()
    {
        $price = $this->price;
        $taxe = $price * 20 / 100;
        return ($taxe);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class)->where('status','=',1);
    }
    
    public function options()
    {
        return $this->belongsToMany(Option::class,'product_option','product_id','option_id');
    }
    
  public function calculateRating()
  {
   $ratings = $this->ratings();
    $avgRating = $ratings->avg('rating');
    $total = round($avgRating,1);
    
    return $total;
  }
    
}
