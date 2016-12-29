<?php

require 'personObject.php';
require 'writeToFile.php';

$person = new person("adam","03/06/1987", "328 Worle moor Road");


/*
* Test getName on new person object
*/
try
{
	$getName ='SUCCESS: testPersonObject: getName() - '.$person->getName();
}
catch(Exception $e)
{
	$getName = 'Failed: getName) -'.$e;
	
}

try
{
	$getDob = 'SUCCESS: textPersonObject: getDob() - '.$person->getDob();
}
catch(Exception $e)
{
	$getDob = 'Failed: getDob() -'.$e;
}

try
{
	$getAddress = 'SUCCESS: testPersonObject: getAddress() - '.$person->getAddress();
}
catch(Exception $e)
{
	$getAddress = 'Failed: getAddress() -'.$e;
}



//$testResult= $getName."\n".$getDob."\n".$getAddress."\n";
$testResultArray = array($getName,$getDob,$getAddress);
//var_dump($testResultArray);

testLog($testResultArray);
echo "<strong>==Test Complete==</strong>";


?>