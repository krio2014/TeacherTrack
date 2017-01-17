<?php

class teacher extends person{
 
    private $lessonList;
    
 public function __construct($anArray){
     
     // generic person object variables 
     $this->fullName = $anArray[0];
	   $this->dob = $anArray[1];
	   $this->address = $anArray[2];
	   $this->postCode = $anArray[3];
	   $this->phoneNumber = $anArray[4];
	   $this->mobileNumber = $anArray[5];
	   $this->emailAddress = $anArray[6];
     
     
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