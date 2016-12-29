<?php

class address{
    
    public $people;
        
    //Constructs a new address object
    public function __construct()
    {
//        global $people;
    }

	/* adds a person object provided by $aPerson
    *   pre condition - $aPerson should be a person object 
    *   that has already been initialised 
	*/
    public function addPerson($aPerson)
    {
        global $people;
        $this->people[] = $aPerson;
        $length = count($people)-1;
        return $this->people;    
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
		
    /*
	*	Returns the name of a person in the people array at the $index provided
	*/
    function getPersonName($index)
    {    
        return $this->people[$index]->getName();   
    }
}