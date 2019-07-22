<?php

namespace App\Filters;

class PriceLteFilter
{
    public static function  apply($model, $input)
    {
        return $model-> where('price', '<=', $input);
    }
}