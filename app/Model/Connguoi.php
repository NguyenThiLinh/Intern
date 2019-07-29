<?php

namespace App\Model;

class Connguoi
{
     public $name = "abc";
     protected $password = "123";
     private $age = "4";
    
     public function show(){
         echo $this->name ."\n";
         echo $this->password ."\n";
         echo $this->age;
     }
     public function MyPublic() { 
         echo "hi";
     }
     protected function MyProtected() {
         echo "bye";
    }
    private function MyPrivate() {
        echo "for me";
     }

     public function find(){
        $this->MyPublic();
        $this->MyProtected();
        $this->MyPrivate();
     }

    const MY_PUBLIC = 'public';
    // const MY_PROTECTED = 'protected';
    // const MY_PRIVATE = 'private';

     public function foo()
    {
        echo self::MY_PUBLIC;
        // echo self::MY_PROTECTED;
        // echo self::MY_PRIVATE;
    }
    //setter getter

    private $firstField;
    private $secondField;

    public function getFirstField() {
        return $this->firstField;
    }
    public function setFirstField($x) {
        $this->firstField = $x;
    }
    public function getSecondField() {
        return $this->secondField;
    }
    public function setSecondField($x) {
        $this->secondField = $x;
    }   
}
   

