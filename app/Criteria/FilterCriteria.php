<?php

namespace App\Criteria;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

class FilterCriteria implements CriteriaInterface
{
    protected $input;
    protected $allowFilters;

    public function __construct($input , $allowFilters)
    {
        $this->input = $input;
        $this->allowFilters = $allowFilters;
    }

    public function apply($model,RepositoryInterface $repository){

        foreach($this->allowFilters as $key => $value) 
        {
            if (isset($this->input[$key]))
            {
                $filterName = $value;
                $model = $filterName::apply($model, $this->input[$key]);
            }
        }

        return $model;
    }
}