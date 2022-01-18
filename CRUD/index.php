<?php
include "database.php";
$obj = new Database();
// $obj->insert('students',['id'=>' ','student_name'=>'Tiasha Choudhury','age'=>'21','city'=>'Kolkata']);
// echo "Insert result is : ";
// print_r($obj->getResult());

$colName = "students.id,students.student_name,students.age,citytb.cname";
$join = "city ON students.city = citytb.cid";
$limit = 3;

$obj->select('students',$colName,$join,null,null,$limit);
echo "\n\nSelect result is : ";
print_r($obj->getResult());


	// $obj->insert('students',['student_name'=>'Kumar Sanu','age'=>'22','city'=>'Delhi']);
	// echo "Insert result is : ";
	// print_r($obj->getResult());

    // $obj->update('students',['city'=>'Chandigarh'],'city="Goa"');
	// echo "Update result is : ";
	// print_r($obj->getResult());

    // $obj->delete('students','age ="20"');
	// echo "Delete result is : ";
	// print_r($obj->getResult());

    // $obj->sql('SELECT * FROM students WHERE age = "22"');
	// echo "SQL result is : ";
	// print_r($obj->getResult());
?>