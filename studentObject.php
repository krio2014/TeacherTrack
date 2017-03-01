<?php
require_once 'personObject.php';
require 'addressObject.php';
//require_once 'subjectObject.php';
//require_once 'index2.php';

//This class inherits from personObject.php so will implement all variables from there.

class student extends person{

    //Student specific variables
    protected $studentPK;
    protected $yearGroup;
    protected $tutorGroup;
    protected $subjects;
    

    public function __construct($anArray)
    {
        // generic person object variables
        $this->fullName = $anArray['name'];
        $this->firstName = $anArray['firstName'];
	    $this->dob = $anArray['dob'];
	    $this->address = $anArray['address'];
	    $this->postCode = $anArray['postcode'];
	    $this->phoneNumber = $anArray['phoneNumber'];
	    $this->mobileNumber = $anArray['mobileNumber'];
	    $this->emailAddress = $anArray['email'];
        
        //student specific variable assignment
        $this->tutorGroup = $anArray['tutorGroup'];
        $this->yearGroup = $anArray['yearGroup'];
        $this->subjects =  $anArray['subjects'];
        //automatically generated variables
        
    }
    
    /*
	*	Adds the specified subject to the subject list
	*/
    public function addSubject($aSubject,$aSubjectList)
    {	
        
        
        try
        {
            foreach($aSubjectList as $subject)
            {

				
                if($subject == $aSubject)
                {
                    $this->enrolledSubjects[] = $aSubject;
                    
                    echo 'Succesfully added '.$subject.' to '.$this->fullName.'<p/>';

                }
            }
        }
        catch(Exception $e)
        {
            echo 'Error: '.$e;
        }
        
    }
    
    /*
    *   Removes the specified subject from $enrolledSubjects
    */
    public function removeSubject($aSubject)
    {
        $key = array_search($aSubject,$this->enrolledSubjects);
        if(in_array($aSubject, $this->enrolledSubjects))
        {            
            unset($this->enrolledSubjects[$key]);
            echo 'Succesfully removed '.$aSubject.' from '.$this->fullName.'<p/>';
        }
    }
    
	/*
	*	returns the subjects that $this student is enrolled on.
	*/
//    public function getEnrolledSubjects()
//    {
//        return $this->enrolledSubjects;
//    }
    
    /*
    *
    */
    public function addYearGroup($aYearGroup)
    {

//        var_dump($temp);
        
        if(empty($this->yearGroup))
        {
            $this->yearGroup = $aYearGroup;
//            echo '<b>'.$this->getName().'</b> has been assigned to '.$aYearGroup;
        }
        else
        {
            echo '<p/>Error: <b>'.$this->getName().'</b> is already assigned to a year group<p/>';
        }
    }
    
    /*
    *
    */
    public function getYearGroup()
    {
        
        return $this->yearGroup;
    }
}


?>