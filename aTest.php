<?php

require_once 'studentObject.php';
require_once 'personObject.php';
require_once 'addressObject.php';
echo '<pre>';


// new array for student info
$array = array('name'=>"Adam Evans",
               'firstName'=>"Adam",
               'dob'=>"03/06/1987",
               'address'=>"328 worlemoor", 
              'postcode'=>"BS247AH", 
               'phoneNumber' => "01275 400 650",
               'mobileNumber' => "07896986986", 
               'email' => "adam@msn.com",
               'tutorGroup'=>"4a", 
               'yearGroup' =>"",
                'subjects' => "");
//var_dump($array);

// a second student

$array2 = array('name'=>"Anne-Marie Burke",
                'firstName'=>"Anne-Marie",
               'dob'=>"03/06/1989",
               'address'=>"328 worlemoor", 
              'postcode'=>"BS247AH", 
               'phoneNumber' => "01275 400 651",
               'mobileNumber' => "07000000000", 
               'email' => "anne-marie@msn.com",
               'tutorGroup'=>"5a", 
               'yearGroup' =>"12",
                'subjects' => "");

//=== TEST adding a new address object
$address = new address();
//var_dump($address);


//=== TEST adding people to the people array  of the address object
$address->addPerson($array,1);
$address->addPerson($array2,1);
//var_dump($address->people);

//=== TEST getPeople Function in addressBook()
$people= $address->getPeople();
//var_dump($people);
//var_dump($address);

//=== TEST find function on addressBook object
$person = $address->find('Adam');
//echo 'fullname:'.$person->getFullName();
//var_dump($person);  

//=== TEST Retieving people array from address object
$address->removePerson("Adam");
//var_dump($address->getPeople());

//=== TEST adding year groups
$address->addYearGroup("7t");
//$address->addYearGroup("7t");
$address->addYearGroup("7y");
$address->addYearGroup("7d");
$address->addYearGroup("7e");
//var_dump($address->getYearGroups());

//=== TEST if a duplicate year group can be added to address object. (MUST BE RAN WITH THE TEST ABOVE)
//$address->addYearGroup("7t");
//var_dump($address->getYearGroups());

//=== TEST retrieving a year group
$yearGroup = $address->getYearGroups;
//var_dump($yearGroup);

//=== TEST removing a Year group
$address->removeYearGroup("7t");
//var_dump($address->getYearGroupss());


// echos the name of the class 

//echo get_class($person);

//=== TEST adding a student to a yearGroup 

$person->addYearGroup('7y');
//$person->addYearGroup('7y');
//var_dump($person->getYearGroup());


//=== TEST
//$person->addSubject($)


//tests if the first object parameter is of the class in the second parameter.
//$test = is_a($student, address);
//var_dump($test);





echo '</pre>';
?>
