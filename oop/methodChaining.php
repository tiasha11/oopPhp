<?php
class first{
    function method1(){
        echo "This is method1<br>";
        return $this;
    }

    function method2(){
        echo "This is method2<br>";
        return $this;
    }

    function method3(){
        echo "This is method3<br>";
    }

}
$object=new first();
$object->method1()->method2()->method3();

?>