<?php

class base{
        public $name="parent class";
        public function calc($a,$b){
            return $a*$b;
        }
    }
    class derived extends base{
        public $name="child class";
        public function calc($a,$b){
            return $a+$b;
        }
    }
    $obj=new derived();

    echo $obj->calc(20,30);
?>