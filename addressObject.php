<?php

require_once('personObject.php');
require_once('studentObject.php');
require_once('teacherObject.php');
//===NEED TO INCLUDE DB CONNECTION HERE

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
        
        $aPerson = $this->find(ucfirst ($aName));
        if($aPerson !=null)
        {
            $compareName = ucfirst($aPerson->getName());
        }
        
        
        if($aName == $compareName)
        {
            $personObject = $this->find($aName);
			$key = array_search($personObject, $this->people);
            

            unset($this->people[$key]);
			
			//===DATABASE CODE GOES HERE
			
			//Checks if the person object still exists
            if(!$this->find($aName))
			{
//                echo $aName." has been removed succesfully.<br/>";
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
		
		foreach($this->getYearGroups() as $theYearGroup)
		{
			if($theYearGroup == $aYearGroup)
			{
				$exists = true;
			}
		}
		if($exists != true)
		{
			$this->yearGroup[] = $aYearGroup;	
			//===DATABASE CODE GOES HERE
		}
		else
		{
			echo "Error: ".$aYearGroup." was not added -  already exists!<p/>";
		}
    }
    
    /*
    *   Removes a year group by the name of the provided parameter
    */
    public function removeYearGroup($aYearGroup)
    {

        $test = $this->getYearGroups();
		$exists = false;
		
		foreach($test as $theYearGroup)
		{

			if($theYearGroup == $aYearGroup)
			{
//				echo ("gets here");
				$exists = true;
				$key = array_search($aYearGroup, $this->yearGroup);
            	unset($this->yearGroup[$key]);
				
				//===DATABASE CODE GOES HERE
				
                //Checks that the yearGroup has been removed succesfully
                if($theYearGroup == $aYearGroup)
                {
//                    echo "<p/>".$aYearGroup." - succesfully removed!<p/>";
                    return true;
                }
			}
		}
		if($exists == false)
		{
			echo ("<p>".$aYearGroup." does not exist, so it cannot be removed.<p/>");
		}
	}
    
	
	
    //=====GETTERS=====//
    
    /*
    *   Returns a people array
    */
	public function getPeople()
    {
		return $this->people;
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
                return $person;
            }
            
            
        }
    }
	
	
	/*
	*	Returns the yearGroup array
	*/
	public function getYearGroups()
	{
		return $this->yearGroup;
	}
    
}