<?php

require '../subjectObject.php';
require '../writeToFile.php';
echo '<pre>';

/*
*   Test studentObject constructor
*/

if($subject = new subject())
{
    $constructResult = "SUCCESS: testSubjectObject - __constructor()";
}
else
{
    $constructResult = "FAILURE: testSubjectObject - __constructor()";
}

/*
*   Test loadSubjects() function
*/
try
{
    $subject->loadSubjects();
}
catch(Exception $e)
{
    echo "FAILURE: ".$e;
    $loadSubjectResults = "FAILURE: testSubjectObject - loadSubject() - ".$e;
}
/*
*   Test addSubject() function
*/

$subject->addSubject("Science","2017","12 months");

/*
* Test getSubject() function
*/
try
{
    $test = $subject->getSubject("Science");
    $year = $test['year'];
    $length = $test['length'];
    var_dump($year);
    var_dump($length);
    
    $getSubjectResult = "SUCCESS: testStudentObject - getStudent - ".$test.'|'.$year.'|'.$length;
}
catch(Exception $e)
{
    echo "FAILURE: ".$e;
    $getSubjectResult = "FAILURE: testStudentObject - getStudent - ".$e;
    
}




$results = array($constructResult, $getSubjectResult);
                 
                 

testLog($results);

echo '</pre>';
?>
