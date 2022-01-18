<?php
class calculation{
    public $a, $b, $c;
    function sum(){
        $this->c = $this->a + $this->b;
        return $this->c;
    }

    function sub(){
        $this->c = $this->a - $this->b;
        return $this->c;
    }
}

$obj =new calculation();
$obj->a = 50;
$obj->b = 30;

$object = new calculation();

$object->a = 20;
$object->b = 10;

echo "Sum of  1st Object: " .$obj->sum(). "<br>";
echo "Subtract of  1st Object: " .$obj->sub(). "<br>";
echo "Sum of 2nd Object: " .$object->sum(). "<br>";
echo "Subtract of 2nd Object: ".$object->sub();
?>
