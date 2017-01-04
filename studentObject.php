<?php
require_once 'personObject.php';

class student extends person{

    
    protected $yearGroup;
    protected $tutorGroup;
    protected $subject;

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
        $this->subject = array();
    }
    
    
    
    function toString()
    {
           return 'Ref: '.$this->personPK.'<br/>Name: '.$this->fullName.'<br/>Date of Birth: '.$this->dob.'<br/>Address: '.$this->address.'<br/>Postcode: '.$this->postCode.'<br/>Phone Number: '.$this->phoneNumber.'<br/>Mobile Number: '.$this->mobileNumber.'<br/>Email Address: '.$this->emailAddress.'<br/>Year Group:'.$this->yearGroup.'<br/>Tutor Group:'.$this->tutorGroup.'<br/>Subject: '.$this->subject;
    }
    
    
    function addSubject($aSubject)
    {
        
    }

    
    




}


?>