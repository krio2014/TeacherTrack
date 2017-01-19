<?php

require_once 'studentObject.php';
require_once 'personObject.php';
require_once 'addressObject.php';
echo '<pre>';


// new array for student info
$array = array('name'=>"adam",
               'dob'=>"03/06/1987",
               'address'=>"328 worlemoor", 
              'postcode'=>"BS247AH", 
               'phoneNumber' => "01275 400 650",
               'mobileNumber' => "07896986986", 
               'email' => "adam@msn.com",
               'tutorGroup'=>"4a", 
               'yearGroup' =>"11");

//var_dump($array);

//new student object
$address = new address();
$address->addPerson($array,1);
//$address->addPerson($array,1);

//array of people objects
$people= $address->getPeople();
//var_dump($arrayOfStudentObjects);

$result = $address->find("adam");
var_dump($result->getName());







//print_r(array_values($people));
//
////var_dump($people);
//foreach($people as $person)
//{
////    var_dump($person);
//    $thePerson = $person;
//    
//    $aName = $theperson[name];
//    echo 'name is: '.$aName;
    
    
//}
//$student = new student($array);
//var_dump($student);

//foreach($array as $value)
//{
//    echo $value.'<p/>';
//}


//tests if the first object parameter is of the class in the second parameter.
//$test = is_a($student, address);
//var_dump($test);





echo '</pre>';
?>
