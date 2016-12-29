<?php

class address{
    
    public $people;
    
    
    //Constructs a new address object
    public function __construct(){
    
        //Makes the people variable global;
        global $people;
        /*
		//Diagnostic Code
        echo '<i>|-----Address constructed-----|</i>';
		*/
    }

	/* adds a person object provided by $aPerson
    *  pre condition - $aPerson should be a person object that has already been initialised 
	*/
    public function addPerson($aPerson){
        global $people;
        
        $people[] = $aPerson;

        $length = count($people)-1;

        echo '<i>|---'.$aPerson->getName().' added at index ['.$length.']---|</i>';
        
        return true;
        
    }
	
	
	
	/*
    * returns a person object from the people array at the provided index
    */
	function getPerson($index){
        global $people;
        echo '<p><i>|----Person object returned at ['.$index.']----|</i><p/>';
        return $people[$index];
    }
    
    /*
	*	Returns the name of a person in the people array at the $index provided
	*/
    function getPersonName($index){ 
        global $people;
        echo '<p><i>|----Person object name returned ['.$index.']----|</i><p/>';
        return $this->people[$index]->getName;
        
    }
    
    /* 
	* Returns the people array
	*/
    public function getPeople(){
        echo '<p><i>|----People array returned----|</i><p/>';
       global $people;
        var_dump($this->people);
        return $people;
        
    }
    
    
    
    
    
}