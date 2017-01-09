<?php

require 'subjectObject.php';
require 'studentObject.php';
require 'addressBookObject.php';

public function __construct($aName,$aDob,$aAddress,$aYearGroup,$aTutorGroup);
{
    $address = new address();
    $student = new student($aName,$aDob,$aAddress,$aYearGroup,$aTutorGroup);
}


function addStudent($student);
{
    $address->addPerson($student);
    $array = $address->getPeople();
    foreach($array as $value)
    {
        if($student->getName() == $value)
        {
            $result = true;
        }
    }
    echo $result;
}

?>
