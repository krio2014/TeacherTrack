<?php

class subject{

    /*
    *   variables
    * StudentList variable is an array that contains all the subjects
    * including their details.
    */
    public $studentList = array();
    public $gradeList = array("A","A*","B","C","D","E","F","U");
    
    /*
    *   Constructor
    */
    public function __construct()
    {
        $gradeList(
            
            );
        return true;
        
    }
    
    /*
    *   Loads a file with a list of students and adds them to $studentList
    */
    public function loadSubjects(/*$aFile*/)
    {
        echo 'this is not finished yet!<br/>';
        return true;
    }
    

    /*
    *   Adds a new subject to the subjectList array with the aName and aYear and length.
    */
    public function addSubject($subjectName,$subjectYear,$subjectLength)
    {
        $this->subjectList[$subjectName] = array(year=>$subjectYear,length=>$subjectLength);
    }
    
    /*
    *   returns aSubject details as an array
    */
    public function getSubject($aSubject)
    {
        $keys= array_keys($this->subjectList);
        $resultArray = null;
        foreach ($keys as $key)
        {
            if($aSubject == $key)
            {
				return true;
//               $resultArray= $this->subjectList[$aSubject];
//               return $resultArray;
            }
            else
            {
                return false;
            }
        }
    }



}

?>