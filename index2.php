<?Php
require 'studentObject.php';
//require 'subjectObject.php';
//require 'addressObject.php';
//require 'addressObject.php';
require_once 'personObject.php';
echo '<pre>';
$person1 = new person("adam","03/06/1987","328 worlemoor", "bs247ah","01275 400 650","07896983691","a@a.com");
$student = new student("adam","03/06/1987","123 the road", "bs247ah","01275 400 652","07896983692","b@b.com");
var_dump($person1);
echo '<br>';
var_dump($student);

echo $person1->toString();
echo'<p>';
echo $student->toString();
//echo $var;

echo '<br>'.$person1->getAddress(true);

//$student = new student("adam","03/06/1987","328worlemore");
//$student2 = new student("Jordan","03/06/1995","1 the road");

//var_dump($student);
echo '<hr/>';
//var_dump($student2);
echo'</pre>';

?>

