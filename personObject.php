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
//            echo '<br/><b>Constructed</b><br/>';
    }
    //Returns a string representation of this person object including reference number, Name, date of birth and address
    function toString(){
       return 'Ref: '.$this->personPK.'<br/>Name: '.$this->name.'<br/>Date of Birth: '.$this->dob.'<br/>Address: '.$this->address;
    }
    
    //Returns the name variable of this person object
    public function getName(){
       global $name;
    
       echo '<i><p/>|----returning person object name----|</i><p>';
       return $this->name;
       
   }
    
    public function getName2(){
        global $name;
        
        return $this->name;
//        return $name;
    }
    
   function getDob(){
       return $this->dob;
   }
    
   function getAddress(){
       return $this->address;
   }
       
}



?>