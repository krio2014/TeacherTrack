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

// a second student

$array2 = array('name'=>"Anne-Marie",
               'dob'=>"03/06/1989",
               'address'=>"328 worlemoor", 
              'postcode'=>"BS247AH", 
               'phoneNumber' => "01275 400 651",
               'mobileNumber' => "07000000000", 
               'email' => "anne-marie@msn.com",
               'tutorGroup'=>"5a", 
               'yearGroup' =>"12");

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

//=== TEST find function on addressBook object
$person = $address->find('adam');
//var_dump($person);

//=== TEST Retieving people array from address object
$address->removePerson("adam");
//var_dump($address->getPeople());

//=== TEST adding a year group
$address->addYearGroup("7t");

//=== TEST if a duplicate year group can be added to address object. (MUST BE RAN WITH THE TEST ABOVE)
//$address->addYearGroup("7t");
//var_dump($address->getYearGroup());

//=== TEST retrieving a year group
$yearGroup = $address->getYearGroup();
//var_dump($yearGroup);

//=== TEST removing a Year group
$address->removeYearGroup("79");
//var_dump($address->getYearGroup());


// echos the name of the class 

echo get_class($person);






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
