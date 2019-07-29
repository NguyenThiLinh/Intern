<?php

namespace App\Model;

class BTMang
{
    public $number = array('one','two','three','four');

    public $fruit = array("a"=>"apple","b"=>"banana","l"=>"lemon");

    public $arrayA = array(1,4,2,3,6);

    public $arrayB = array(2,4,6,3,7);

    public function list()
    {
        sort($this->number);

        foreach($this->number as $n)
        {
            echo $n."\n";
        }
    }

    public function listAsort()
    {
        asort($this->fruit);

        foreach($this->fruit as $key => $name)
        {
            echo $key ." is ". $name ."\n";
        }
    }

    public function multiSort(){
       array_multisort($this->arrayA,$this->arrayB);

       return [$this->arrayA,$this->arrayB];   
    }
}