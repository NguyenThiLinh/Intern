<?php

namespace App\Filters;

class PriceGteFilter
{
    public static function  apply($model, $input)
    {
        return $model-> where('price', '<=', $input);
    }
}