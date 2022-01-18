<?php
namespace first;
    class test{
        public function __construct(){
            //echo "This is first class"."<br>";
            $test=new \second\test();
        }
    }  
    function show(){
        echo "This is first file"."<br>";
    }

?>