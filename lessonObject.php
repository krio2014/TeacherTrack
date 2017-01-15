<?php

class lesson{

    //Lesson list contains a list of all schedules lessons and their participants.
    private $lessonList;
    private $subjectList;
    
    
    public function __construct(){
    
    $this->lessonList = array();
    
    
}
    
   
    
    /*
    *   returns the subjectList as an array
    *
    */
    function getSubjects()
    {
        return $this->subjectlist;
    }
    
    /*
    *   adds a new subjec to the subjectList Array
    *
    */
    function addSubject()
    {
        
    }
    
    
    /*
    *   returns the lesson list as an array
    *
    */
    function getLessons()
    {
        return $this->lessonList;
    }
    
     function addLesson($aSubject,$aDate,$aTeacher)
    {
        try{
            $this->lessonList[] = array($aSubject, $aDate,$aTeacher, null); 
            
              
        }
        catch(Exception $e)
        {
            echo "error: ".$e;
        }
        
  
    }
    
}


?>
