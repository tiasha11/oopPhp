<?php
// class abc{

// }
// class xyz extends abc{
//     function name(){
//         echo "Parent class name:".get_parent_class('xyz')."\n";

//     }
// }

// $obj=new xyz();
// $obj->name();
// echo "My class name is :".get_class($obj);

/********************************************************************************* */
//Returns an array of method names defined for the class specified by object_or_class.
//get_class_methods() example
class myclass {
    // constructor
    function __construct()
    {
        return(true);
    }

    // method 1
    function myfunc1()
    {
        return(true);
    }

    // method 2
    function myfunc2()
    {
        return(true);
    }
}

$class_methods = get_class_methods('myclass');
// or
// $class_methods = get_class_methods(new myclass());

foreach ($class_methods as $method_name) {
    echo "$method_name\n";
}

?>