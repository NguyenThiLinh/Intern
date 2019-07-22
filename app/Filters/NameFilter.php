<?php 

namespace App\Filters;

class NameFilter 
{
    public static function  apply($model, $input)
    {
        return $model->where('name', 'Ilike', "%{$input}%");
    }
}