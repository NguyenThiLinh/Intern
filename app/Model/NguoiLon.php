<?php

namespace App\Model;

class NguoiLon extends Connguoi
{
    public $name = "nguoilon";
    protected $password = "345";
    const MY_PUBLIC = "rule";

    // public function show(){
    //     echo $this->name;
    //     echo $this->password;
    //     echo $this->age;
    // }
    function find2()
    {
        $this->MyPublic()."\n";
        $this->MyProtected() ."\n";
        $this->MyPrivate();  
    }
    function foo2()
    {
        echo static::MY_PUBLIC;
    }
}