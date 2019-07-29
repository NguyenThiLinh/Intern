<?php

namespace App\Model;

class Mang 
{
    public $arrayA = array(1,2,3,4,5,4,3);
    public $arrayB = array(4,5,6,7,8,9);

    public function  array(){
       return $this->arrayA + $this->arrayB;
    }
    public function mergeArray()
    {
      $merge =  array_merge($this->arrayA, $this->arrayB);
      return $merge;
    }
    public function uniqueArray()
    {
      $unique = array_unique($this->arrayA);
      return  $unique; 
    }

    public function intersectArray()
    {
       $intersect =  array_intersect ($this->arrayA, $this->arrayB);

       return $intersect;
    }

    public function exceptArray()
    {
       $except= array_diff ($this->arrayA, $this->arrayB);

       return $except;
    }

}