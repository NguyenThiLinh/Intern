<?php 

namespace App\Filters;

class CategoryIdFilter 
{
    public static function  apply($model, $input)
    {
        return $model->where('category_id', '=', $input);
    }
}