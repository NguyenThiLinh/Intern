<?php

namespace App\Model;

class Mang1Chieu
{
   public $number = array(1,4,6,8,3);

   public function sapxepmang(){ 
    sort($this->number);
    return $this->number;
   }
    
   public function insert(){
        $i = random_int(1,10);
        array_push($this-> number,$i);
        return $this->sapxepmang();
   } 
   
   public function insertElement(){
      sort($this->number);
      $length = count($this->number);
      $array = $this->number;
      $index = random_int(1,10);
      
      $item = array();
      //$temp = 0;

      for($i =0; $i < $length; $i++)
      {  
         $item[$i] = $array[$i];
         if($array[$i]<$index)
         {
            $item[$i+1]= $index;
         }
         else{
            $item[$i+1] = $array[$i];
         }
      }
      return $item;   
   }
}
 