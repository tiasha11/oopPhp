<?php
require "first.php";
require "second.php";
function show(){
    echo "This is namespace file"."<br>";
}
$object=new second\test();
// $object1=new first\test();

first\show();
?>