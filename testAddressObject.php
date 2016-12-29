<?php
require 'addressObject.php';
//require 'testPersonObject.php';
require 'personObject.php';
require 'writeToFile.php';

	/*
	*	create new person object for tests
	*/
	$person = new person("adam","03/06/1987", "328 worle moor road");


	/*
	*	Test creating a new address object
	*/
	try
	{
		$address = new address($person);
		$constructResult = 'SUCCESS: testAddressObject: construct()';
		$getName ='SUCCESS: testPersonObject: getName() - '.$person->getName();
	}
	catch(Exception $e)
	{
		$constructResult = 'Failed: getName) -'.$e;

	}

	/*
	*	Test addPerson - adding a person object to the people array of 
	*/
	try
	{
		$address->addPerson($person);
		$addPersonResult = "SUCCESS: testAddressObject: addPerson()";
	}
	catch(Exception $e)
	{
		$addPersonResult = "Failure: testAddressObject: addPerson() - ".$e;
	}

	/*
	* Test getPeople() - $people is an array of person objects within addressObject
	*/
	try
	{
		if($address->getPeople())
		{
			$getPeopleResult = "SUCCESS: testAddressObject: getPeople()";

		}
		else
		{
			$getPeopleResult = "FAILURE: testAddressObject: getPeople()";
		}


	}
	catch(Exception $e)
	{
		$getPeopleResult = "FAILURE: testAddressObject: getPeople()";
	}

	try
	{
		if($personName = $address->getPersonName(0))
		{
			$getPersonNameResult = "SUCCESS: testAddressObject: getPersonName() - ". $personName;
		}
	}
	catch(Exception $e)
	{
		$getPersonNameResult = "FAILURE: testAddressObject: getPeople()";
	}

//var_dump($getPeopleResult);



//$testResult= $getName."\n".$getDob."\n".$getAddress."\n";
$testResultArray = array($constructResult,$addPersonResult, $getPeopleResult,$getPersonNameResult);
//var_dump($testResultArray);

testLog($testResultArray);
echo "<strong>==Test Complete==</strong>";

?>