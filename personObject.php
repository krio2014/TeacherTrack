<?php

class person {
    
    //person properties
    protected $personPK;
    private $name;
    private $dob;
    private $address;
    
    //Constructs a new person object with a Name, Date of Birth and address
    public function __construct($aName,$aDob, $aAddress){
       $this->personPK = 1;
       $this->name = $aName;
       $this->dob = $aDob;
       $this->address = $aAddress;
          
		/*
          //Diagnostic code
          echo '<br/><b>Person Object Constructed:</b><br/>';
            echo $this->name.'<br/>';
            echo $this->dob.'<br/>';
            echo $this->address.'<br/>';
        */
    }
    
    
    //Returns a string representation of this person object including reference number, Name, date of birth and address
    function toString(){
       return 'Ref: '.$this->personPK.'<br/>Name: '.$this->name.'<br/>Date of Birth: '.$this->dob.'<br/>Address: '.$this->address;
    }
    
    
    
    //Returns the name variable of this person object
	public function getName(){
		global $name;
        /*    
        //diagnostic code
           echo '<i><p/>|----Returning person object name----|</i><br/>';
    	*/
        
		return $this->name;
	}
    
   //Returns the date of birth of this person object
   function getDob(){
        /*
       //Diagnostic code
        echo '<br/><i>|-----Returning person dob-----|</i><br/>';
       */
       return $this->dob;   
   }
   //Returns the address of this person object
   function getAddress(){
       /*
       //Diagnostic code
        echo '<br/><i>|-----Returning person address-----|</i><br/>';
       */
       
       return $this->address;
   }
       
}



?>