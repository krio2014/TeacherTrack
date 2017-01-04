<?php
//require '../personObject.php';
require '../studentObject.php';
require '../addressObject.php';
require '../writeToFile.php';

	/*
	*	Test student constuctor
	*/
	try
	{
		$student = new student("Steve","19/10/1957","30 pollard road");
		$studentResult = "SUCCESS: testStudentObject - constructor";
	}
	catch(Exception $e)
	{
		$studentResult = "Failure: testStudentObject - constructor";
	}

	/*
	*	Test student object toString() method
	*/
	try
	{
		$student->toString();
		$toStringResult = "SUCCESS: testStudentObject: toString() - \n".$student->toString();
	}
	catch(Exception $e)
	{
		$toStringResult = "FAILURE: testStudentObject - toString()".$e;
	}

	/*
	*	result arrange
	*/
	$testResult = array($studentResult,$toStringResult);

    /*
    *   Test addSubject()
    */

    


	/*
	*	write out to log file
	*/
	try
	{
		testLog($testResult);
		echo "<strong>===Test Completed===</strong>";
	}
	catch(Exception $e)
	{
		echo "failed to write to file - ".$e;
	}



?>

