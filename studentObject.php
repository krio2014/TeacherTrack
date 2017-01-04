<?php
require_once 'personObject.php';
require_once 'subjectObject.php';
require_once 'index2.php';

class student extends person{

    
    protected $yearGroup;
    protected $tutorGroup;
    protected $enrolledSubjects;

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
    
    
    
    function toString()
    {
           return 'Ref: '.$this->personPK.'<br/>Name: '.$this->fullName.'<br/>Date of Birth: '.$this->dob.'<br/>Address: '.$this->address.'<br/>Postcode: '.$this->postCode.'<br/>Phone Number: '.$this->phoneNumber.'<br/>Mobile Number: '.$this->mobileNumber.'<br/>Email Address: '.$this->emailAddress.'<br/>Year Group:'.$this->yearGroup.'<br/>Tutor Group:'.$this->tutorGroup.'<br/>Subject: '.$this->subject;
    }
    
    
    function addSubject($aSubject,$aSubjectList)
    {
//        var_dump($aSubjectList);
        
        try
        {
            foreach($aSubjectList as $subject)
            {

                if($subject == $aSubject)
                {
                    echo $aSubject." exists<p>";
                    $this->enrolledSubjects[] = $aSubject;
//                    var_dump($this->enrolledSubjects);
                }
                else
                {
                    echo $aSubject." does not exist<p>";
                }

            }
        }
        catch(Exception $e)
        {
            echo 'Error: '.$e;
        }
        
    }

    function getEnrolledSubjects()
    {
//        var_dump($this->enrolledSubjects);
        return $this->enrolledSubjects;
    }
    
    




}


?>