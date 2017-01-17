<?php
require 'addressObject.php';


$address = new address();

$aPerson = array("adam","03/06/1987","328 worlemoor","bs243ah","07854585458","07854585458","a@a.com");

$aPerson1 = array("Steve","03/06/1987","328 worlemoor","bs243ah","07854585458","07854585458","a@a.com");

$aPerson2 = array("Anne-Marie","03/06/1987","328 worlemoor","bs243ah","07854585458","07854585458","a@a.com");
//var_dump($aPerson);


$address->addPerson($aPerson, 0);
$address->addPerson($aPerson1, 2);
$address->addPerson($aPerson2, 1);

$people = $address->getPeople();

$length = $address->getLength();

$array = $address->getPeople();

echo count($array);

var_dump ($array[1]);


?>
