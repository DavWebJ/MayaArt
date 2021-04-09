<?php

use Gloudemans\Shoppingcart\Facades\Cart;

function FormatPrice($priceInDecimal)
{
    
    $price = floatval($priceInDecimal);
    return number_format($price, 2, ',', ' ') . ' €';
    
}

function Total()
{

    return (Cart::subtotal());
    
}

function FraisDePort()
{
    $taxe = Cart::subtotal() * 20 / 100;
    return ($taxe);
}

function TotalTTC()
{
    $taxe = Cart::subtotal()  * 20 / 100;
    $taxeRound =  round($taxe, 1);
    $priceTTC = Cart::subtotal()  + $taxeRound;
    return $priceTTC;
}

function IsFreeShipping()
{
    $price =  Cart::subtotal();
    $maxPrice = 50;
    $isFree = false;
    if($price > $maxPrice)
    {
        $isFree = true;
        return $isFree;
    }else
    {
        $isFree = false;
        return $isFree;
    }
}

function IsPriceReduce()
{
    $isReduce = false;
    foreach (Cart::content() as $item) {
        if($item->model->price_promos > 0)
        {
            $isReduce = true;
        }else
        {
            $isReduce = false;
        }
        return $isReduce;
    }
}

function OptionPrice($option)
{

    $theOption = Cart::subtotal() + $option;
    return $theOption;
   
}



