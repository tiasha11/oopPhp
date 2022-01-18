<?php
// class myClass{

// }
// if(class_exists('myClass')){
//    //echo "This is Class Exists...";
//     $obj=new myClass();
// }
// else{
//     echo "This class is not exist";
// }

// interface myInterface{

// }
// if(interface_exists('myInterface')){
//     echo "This is interface exists";
//     class myClass implements myInterface{

//     }
// }
// else{
//     echo "This interface is not exists";
// }

class myClass{
    public function mymethod(){

    }
}
$obj=new myClass();
    if(method_exists($obj,'mymethod')){
       echo "This is Method Exists...";
  
    }
    else{
        echo "This method does not exist";
    }
?>                                        