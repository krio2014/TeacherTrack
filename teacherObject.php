<?php

class teacher extends person{
 
    private $lessonList;
    
 public function __construct(){
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