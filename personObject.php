<?php

class person {
    
    //person properties
    protected $personPK;
    private $fullName;
    private $dob;
    private $address;
    private $postCode;
    private $phoneNumber;
    private $mobileNumber;
    private $emailAddress;
    
    //Constructs a new person object with a Name, Date of Birth and address
    public function __construct($aName,$aDob, $aAddress,$aPostCode,$aPhoneNumber,$aMobileNumber, $aEmailAddress)
    {
       $this->personPK = 1;
        $this->fullName = $aName;
        $this->dob = $aDob;
        $this->address = $aAddress;
        $this->postCode = $aPostCode;
        $this->phoneNumber = $aPhoneNumber;
        $this->mobileNumber = $aMobileNumber;
        $this->emailAddress = $aEmailAddress;
    }
    
    
    //Returns a string representation of this person object including reference number, Name, date of birth and address
    function toString()
    {
       return 'Ref: '.$this->personPK.'<br/>Name: '.$this->fullName.'<br/>Date of Birth: '.$this->dob.'<br/>Address: '.$this->address.'<br/>Postcode: '.$this->postCode.'<br/>Phone Number: '.$this->phoneNumber.'<br/>Mobile Number: '.$this->mobileNumber.'<br/>Email Address: '.$this->emailAddress;
        
        
        

    }
    
    //Returns the name variable of this person object
	public function getName()
    {
		return $this->fullName;
	}
    
   //Returns the date of birth of this person object
    function getDob()
    {
       return $this->dob;   
    }
    
   /*
   * If the parameter passed is equal to true then a string prepresentation of the address and the postcode is returned, else just the value of the address is * returned
   */
    function getAddress($boolean)
    {
       if($boolean == true)
       {
           return $this->address.'<br/>'.$this->postCode;
       }
       else
       {
           return $this->address;
       }
    }
    /*
    *   returns the value of $phoneNumber
    */
    function getPhoneNumber()
    {
        return $this->phoneNumber;
    }
    
    /*
    *   returns the value of $mobileNumber
    */
    function getMobileNumber()
    {
        return $this->mobileNumber;
    }
    
    /*
    *   returns the value of $emailAddress
    */
    function getEmailAddress()
    {
        return $this->emailAddress;
    }
       
}



?>