<?php

require_once('personObject.php');
require_once('studentObject.php');
require_once('teacherObject.php');

class address{
    
    public $people;
    public $yearGroup;
        
    //Constructs a new address object
    public function __construct()
    {
        $this->people = array();
        $this->yearGroup = array();
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

        

        
        if($queryName == $compareName)
        {
            $personObject = $this->find($aName);
			$key = array_search($personObject, $this->people);
            

            unset($this->people[$key]);
			
			//Checks if the person object still exists
            
            if(!$this->find($aName))
			{
                
//                				echo $aName." has been removed succesfully.<br/>";
			}
        }
        else
        {
            echo $aPerson.' does not exist';
        }
    }
	
    /*
    *   First checks the yearGroup array to see if $aYearGroup already exists, if it doesn't then aYearGroup is added, otherwise warns the user
    */
    public function addYearGroup($aYearGroup)
    {	
		$exists = null;
		
		foreach($this->getYearGroup() as $theYearGroup)
		{
			if($theYearGroup == $aYearGroup)
			{
				$exists = true;
			}
		}
		if($exists != true)
		{
			$this->yearGroup[] = $aYearGroup;	
		}
		else
		{
			echo "yeargroup <b>".$aYearGroup."</b> already exists!";
		}
    }
    
    /*
    *   Removes a year group by the name of the provided parameter
    */
    public function removeYearGroup($aYearGroup)
    {

        $test = $this->getYearGroup();
		var_dump($test);
		$exists = false;
		
		foreach($test as $theYearGroup)
		{

			if($theYearGroup == $aYearGroup)
			{
				echo ("gets here");
				$exists = true;
				$key = array_search($aYearGroup, $this->yearGroup);
            	unset($this->yearGroup[$key]);
				
			}
		}
		if($exists =false)
		{
			echo ($aYearGroup." does not exist, so we cannot remove it");
		}
	}
    
	/*
    * returns a person object from the people array at the provided index
    */
    public function find($aName)
    {
        foreach($this->getPeople() as $person)
        {
    
            if($name = $person->getName() == $aName)
            {
//                echo'is here';
                
                return $person;
            }
            
        }
    }
	
    /*
    *   Returns a people array
    */
	public function getPeople()
    {
		return $this->people;
	}
	
	/*
	*	Returns the yearGroup array
	*/
	public function getYearGroup()
	{
		return $this->yearGroup;
	}
    
	/*
    *   returns the length of the $people array
    */
    private function getLength()
	{
			
		return count($this->people);
	}
}