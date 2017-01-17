<?php

require_once('personObject.php');
require_once('studentObject.php');
require_once('teacherObject.php');

class address{
    
    public $people;
        
    //Constructs a new address object
    public function __construct()
    {
        $this->people = array();
		return true;
    }

	/* receieves an array of string information that is then used to create a person, 
	* student or teacher object depending on an integer (aType) that is seleted
    *   if 0 a person object is created
    *   if 1 a student obejct is created
	*	if 2 a teacher object is created
	*	if 3 a parent object is created
	*/
    public function addPerson($aPerson, $aType)
    {
//		var_dump($aPerson);
		
       	switch ($aType) {
    		// add a person object
			case 0:
				$person = new person($aPerson);
				$this->people[] = $person;
				break;
    		// add a student
			case 1:
        		$student = new student($aPerson);
				$this->people[] = $student;
//				var_dump($this->people);
        		break;
    		// add a teacher
			case 2:
        		$teacher = new teacher($aPerson);
				$this->people[] = $teacher;
//				var_dump($this->people);
        		break;
			case 2:
				$parent = new parent($aPerson);
				$this->people[] = $parent;
				break;
	   		}
	}
    
    /*
    *   Removes the selected person from the people array
    */
    public function removePerson($aPerson)
    {
        echo 'gets here';
        if($this->people[$aPerson])
        {
            unset($this->people[$aPerson]);
            echo $aPerson.' removed';
        }
        else
        {
            echo $aPerson.' does not exist';
        }
    }
	
	/*
    * returns a person object from the people array at the provided index
    */
	function getPerson($index)
    {
        return $this->people[$index];
    }
	
    /*
    *   returns the people array
    */
	function getPeople()
    {
		return $this->people;
	}
	
	

	function getLength()
	{
			
		return count($this->people);
	}
	
}