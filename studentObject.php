<?php
require_once 'personObject.php';
require_once 'subjectObject.php';
require_once 'index2.php';

//This class inherits from personObject.php so will implement all variables from there.

class student extends person{

    //Student specific variables
    protected $yearGroup;
    protected $tutorGroup;
    

    public function __construct($aName,$aDob,$aAddress,$aPostCode,$aPhoneNumber,$aMobileNumber, $aEmailAddress)
    {
        $this->personPK = 2;
        $this->fullName = $aName;
        $this->dob = $aDob;
        $this->address = $aAddress;
        $this->postCode = $aPostCode;
        $this->phoneNumber = $aPhoneNumber;
        $this->mobileNumber = $aMobileNumber;
        $this->emailAddress = $aEmailAddress;
        
        //student specific variable assignment
        $this->yearGroup = "4a";
        $this->tutorGroup = "4a";
        $this->enrolledSubjects = array(); 
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