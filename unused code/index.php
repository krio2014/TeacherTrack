<?php

//======================REQUIRES======================//
require 'personObject.php';
require 'studentObject.php';
//require 'addressBookObject.php';
require 'addressObject.php';

echo '<pre>';
//======================PERSON OBJECT TEST CODE======================//
//$me = new person("adam", "03/06/1987", "328 Worle moor road");
//echo $me->toString();
//echo ' <br/>';



//======================STUDENT OBJECT TEST CODE======================//
//$student = new student("barry", "03/06/1988", "329 Worle moor road");

//echo $student->toString();
//echo $student->getAddress;



//======================ADDRESSBOOK OBJECT TEST CODE======================//

//-----create new address object-----//

//$address = new address();

//------Return person object------//

//$var =  $address->getPerson(0);

//-----Return person object variables-----//
//var_dump($var->getName());
//var_dump($var->getDob());
//var_dump($var->getAddress());

//-----check person object toString()-----//

//echo '<p>';
//print_r($var->toString());

//-----  -----//



//======================ADDRESS OBJECT TEST CODE======================//
$address = new address();

//-----Test adding person object to address object-----//

$me = new person("bob", "06/06/1987", "a road some where");
$address->addPerson($me);
$var = $address->getPeople();

print_r($address->getPerson(0)->getName());

//$address->getPerson(0);
//$address->getPersonName(0);
//$address->getPeople();

//-----testing adding a student to address object-----//
//$student = new student("nigel", "19/19/1982", "some stuff");
//var_dump($student);
//$address->addPerson($student);

//$rStudent = $address->getPerson()




//$array = $address->getPeople();
//echo $array[2]->getName();


//$t = $student->getName();
//var_dump($t);


echo '</pre>';

?>

