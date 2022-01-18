<?php
//     class Personal{
//         public static $name = "TIYASHA";
//         public static function show(){
//             echo " ".self::$name;
//         }
//     }

//   echo Personal::$name;
//    Personal::show();
 
// class Personal{
//     public static $name = "TIYASHA";
// }

// class Accounts extends Personal {
//     public function show(){
//         echo parent::$name;
//     }
// }

/**
 * Using constructor
 * */ 

// class Personal{
//     public static $name = "TIYASHA";

//     public static function show(){
//         echo self::$name;
//     }

//    public function __construct($n){
//         self::$name = $n;
//     }
// }

// $test=new Personal("Pechi");
// $test->show();

class base{
    public static $name = "Sachin";
    
    public static function show() {
        echo self::$name;
    }
}

class derived extends base{
    public static function show(){
        echo parent:: $name;
    }
}

$test = new derived();
$test->show();
 
?>