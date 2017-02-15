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

	/* receieves an array of string information that is then used 
    *  to create a person, 
	*  student or teacher object depending on an integer (aType) that is seleted
    *  if 0 a person object is created
    *  if 1 a student obejct is created
	*  if 2 a teacher object is created
	*  if 3 a parent object is created
	*/
    public function addPerson($aPerson, $aType)
    {
        try{
			
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
        		break;
    		// add a teacher
			case 2:
        		$teacher = new teacher($aPerson);
				$this->people[] = $teacher;
        		break;
			case 2:
				$parent = new parent($aPerson);
				$this->people[] = $parent;
				break;
	   		}
		}
		catch(Exception $e)
		{
			echo 'There appears to have been an error: </p>'.$e;
		}
        
    }
    
    /*
    *   Removes the selected person from the people array
    */
    public function removePerson($aName)
    {
        $queryName = $aName;
        $compareName = $this->find($aName)->getName();
//		var_dump($compareName);
        
//        var_dump($this->people);
        
        if($queryName == $compareName)
        {
            $personObject = $this->find($aName);
			$key = array_search($personObject, $this->people);
            var_dump($key);
//			var_dump($this->people);
            unset($this->people[$key]);
			
			//Checks if the person object still exists
            if(!$this->find($aName))
			{
				echo $aName." has been removed succesfully.<br/>";
			}
        }
        else
        {
            echo $aPerson.' does not exist';
        }
    }
	
	/*
    * returns a person object from the people array at the provided index
    */
    function find($aName)
    {
        foreach($this->getPeople() as $person)
        {
    
            if($name = $person->getName() == $aName)
            {
                
                return $person;
            }
            
        }
    }
	
    /*
    *   returns the people array
    */
	public function getPeople()
    {
		return $this->people;
	}
	
    function getLength()
	{
			
		return count($this->people);
	}
}