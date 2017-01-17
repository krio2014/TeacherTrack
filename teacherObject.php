<?php

class teacher extends person{
 
    protected $lessonList;
    
 public function __construct($anArray){
     
     // generic person object variables 
        $this->fullName = $anArray[name];
	    $this->dob = $anArray[dob];
	    $this->address = $anArray[address];
	    $this->postCode = $anArray[postCode];
	    $this->phoneNumber = $anArray[phoneNumber];
	    $this->mobileNumber = $anArray[mobileNumber];
	    $this->emailAddress = $anArray[email];
     
     
     //teacher specific variables
     $this->lessonList = array();
     
}

    public function addLesson($aLesson){
        
        try
        {
            $this->lessonList[] = $aLesson;
        }
        catch(Exception $e)
        {
            echo "Error: ".$e;
        }
    }
    
    public function removeLesson($aLesson){
        
        $key = array_search($aSubject,$this->lessonList); 
        
        if(in_array($aLesson, $this->lessonList))
        {            
            unset($this->lessonList[$key]);
            echo 'Succesfully removed '.$aLesson.' from '.$this->fullName.'<p/>';
        }
    }
    
}


?>