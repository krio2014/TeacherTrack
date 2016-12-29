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
        
        $this->people[] = $aPerson;

        $length = count($people)-1;

        echo '<i>|---\'addressObject.php\': '.$aPerson->getName().' added at index ['.$length.']---|</i>';
//        var_dump($people);
        return $this->people;
        
    }	
	
	/*
    * returns a person object from the people array at the provided index
    */
	function getPerson($index){
//        global $people;
		
        echo '<p><i>|----\'addressObject.php\':Person object returned at ['.$index.']----|</i><p/>';
        return $this->people[$index];
    }
	
    
	public function getPeople(){
		return $this->people;
	}
	
	
	
	/* 
	* Returns the people array
	*/
//    public function getPeople(){
//       global $people;
//
//		//Diagnostic Code
//		echo '<p><i>|----People array returned----|</i><p/>';
//       
//        
//        return $this->people;
//        
//    }
	
    /*
	*	Returns the name of a person in the people array at the $index provided
	*/
    function getPersonName($index){ 
        global $people;
        echo '<p><i>|----Person object name returned ['.$index.']----|</i><p/>';
        return $this->people[$index]->getName();
        
    }
    
    
    
    
    
    
    
}