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

	/* adds a person object provided by $aPerson
    *   pre condition - $aPerson should be a person object 
    *   that has already been initialised 
	*/
    public function addPerson($aPerson, $aType)
    {
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
        
//        $this->people[] = $aPerson;
//        $length = count($people)-1;
//        return $this->people;    
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
	public function getPeople()
    {
		return $this->people;
	}
	
}