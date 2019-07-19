<?php

namespace App\Criteria;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class SortByColumnCriteria.
 *
 * @package namespace App\Criteria;
 */
class SortByColumnCriteria implements CriteriaInterface
{
    protected $input;
    protected $allowedColumns;
    
    /**
     * Apply criteria in query repository
     *
     * @param string              $model
     * @param RepositoryInterface $repository
     *
     * @return mixed
     */
    public function __construct( $input, $allowedColumns )
    {
      $this->input = $input;
      $this->allowedColumns = $allowedColumns;
    }

    public function apply($model, RepositoryInterface $repository)
    {
        $orders = explode(",", $this->input);
       
        foreach($orders as $order)
        {
            $orders = explode(".", $order);
           
            if(count($orders) == 2)
            {
                if( in_array($orders[0], $this->allowedColumns) && in_array($orders[1], ['asc','desc']))
                { 
                    $model = $model->orderBy($orders[0], $orders[1]);
                }		
            }
        }

        return $model;    
    }
}
