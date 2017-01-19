<?php
require_once 'personObject.php';
//require_once 'subjectObject.php';
//require_once 'index2.php';

//This class inherits from personObject.php so will implement all variables from there.

class student extends person{

    //Student specific variables
    protected $studentPK;
    protected $yearGroup;
    protected $tutorGroup;
    

    public function __construct($anArray)
    {
        // generic person object variables
        $this->fullName = $anArray['name'];
	    $this->dob = $anArray['dob'];
	    $this->address = $anArray['address'];
	    $this->postCode = $anArray['postcode'];
	    $this->phoneNumber = $anArray['phoneNumber'];
	    $this->mobileNumber = $anArray['mobileNumber'];
	    $this->emailAddress = $anArray['email'];
        
        //student specific variable assignment
        $this->tutorGroup = $anArray['tutorGroup'];
        $this->yearGroup = $anArray['yearGroup'];
    
        //automatically generated variables
        
    }
    
    
    /*
	*	Returns a string representation of $this student object.
	*/
    public function toString()
    {
           return 'Ref: '.$this->personPK.'<br/>Name: '.$this->fullName.'<br/>Date of Birth: '.$this->dob.'<br/>Address: '.$this->address.'<br/>Postcode: '.$this->postCode.'<br/>Phone Number: '.$this->phoneNumber.'<br/>Mobile Number: '.$this->mobileNumber.'<br/>Email Address: '.$this->emailAddress.'<br/>Year Group:'.$this->yearGroup.'<br/>Tutor Group:'.$this->tutorGroup.'<br/>Subject: '.$this->subject;
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
    public function getEnrolledSubjects()
    {
        return $this->enrolledSubjects;
    }
}


?>