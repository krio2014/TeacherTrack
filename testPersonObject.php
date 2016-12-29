<?php

require 'personObject.php';

$person = new person("adam","03/06/1987", "328 Worle moor Road");

echo '<b>getName() succesful: </b>'.$person->getName().'<br/>';
echo '<b>getDob() succesful: </b>'.$person->getDob().'<br/>';
echo '<b>getAddress() succesful: </b>'.$person->getAddress().'<br/>';

?>