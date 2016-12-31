<?php
require_once 'personObject.php';

class student extends person{

    
    protected $yearGroup;
    protected $tutorGroup;
    protected $subject;

    public function __construct($aName,$aDob,$aAddress)
    {
        $this->personPK = 2;
        $this->name = $aName;
        $this->dob = $aDob;
        $this->address = $aAddress;
        $this->yearGroup = "4a";
        $this->tutorGroup = "4a";
        $this->subject = array();

        echo'<p>';
    }
    
    
    
    function toString()
    {
       return 'Ref: '.$this->personPK.'<br/>Name: '.$this->name.'<br/>Date of Birth: '.$this->dob.'<br/> Address: '.$this->address.'<br/>Year Group:'.$this->yearGroup.'<br/>Tutor Group:'.$this->tutorGroup;
    }
    
    
    function addSubject()
    {
        
    }

    
    




}


?>