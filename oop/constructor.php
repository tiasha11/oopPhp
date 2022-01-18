<?php
// class person{
//     public $name,$age;
//     function show(){
//         echo $this->name."-".$this->age;
//     }
// }
// $obj = new person;
// $obj->name="Tiasha";
// $obj->age="21";
// $obj->show();


class person{
    public $name;
    public $age ;

    function __construct($name = "Tiyasha", $age = 50)
    {
        $this->name = $name;
        $this->age = $age;
        
    }
    function show(){
        echo $this->name."-".$this->age."<br>";
    }
}
$obj = new person();                 //default constructor
$obj1 = new person("Ronit", 23);    //parameterised constructor
$obj2 = new person("tiash", 20);
// $obj->name="Tiasha";
// $obj->age="21";
$obj->show();
$obj1->show();
$obj2->show()
?>