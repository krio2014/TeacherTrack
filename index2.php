<?Php
require 'studentObject.php';
require 'subjectObject.php';
require 'addressObject.php';
require 'addressObject.php';
require 'addressObject.php';

$student = new student("adam","03/06/1987","328worlemore");
$student2 = new student("Jordan","03/06/1995","1 the road");

var_dump($student);
echo '<hr/>';
var_dump($student2);


?>

