<?php

class person {
    
    //person properties
//    protected $personPK;
    
	protected $firstName;
	protected $lastName;
    protected $dob;
    protected $address;
    protected $postCode;
    protected $phoneNumber;
    protected $mobileNumber;
    protected $emailAddress;
    
    //Constructs a new person object with a Name, Date of Birth and address
    
    
    //$aName,$aDob, $aAddress,$aPostCode,$aPhoneNumber,$aMobileNumber, $aEmailAddress
    public function __construct($anArray)
    {
        
        $this->fullName = $anArray[name];
	    $this->dob = $anArray[dob];
	    $this->address = $anArray[address];
	    $this->postCode = $anArray[postCode];
	    $this->phoneNumber = $anArray[phoneNumber];
	    $this->mobileNumber = $anArray[mobileNumber];
	    $this->emailAddress = $anArray[email];
                
//        $this->personPK = 1;
//        $this->fullName = $aName;
//        $this->dob = $aDob;
//        $this->address = $aAddress;
//        $this->postCode = $aPostCode;
//        $this->phoneNumber = $aPhoneNumber;
//        $this->mobileNumber = $aMobileNumber;
//        $this->emailAddress = $aEmailAddress;
    }
    
    /*
	*	Returns the name variable of this person object
	*/
	public function getName()
    {
		
        
        return $this->firstName;
//        return $this->firstName;
        
	}
    
    /*
    *
    */
    public function getFullName()
    {
        
        $fullName = $this->firstName + $this->lastName; 
    }
    
   /*
   *	Returns the date of birth of this person object
   */
	public function getDob()
    {
       return $this->dob;   
    }
    
   /*
   *	If the parameter passed is equal to true then a string prepresentation
   *	of the address and the 
   *	postcode is *returned, else just the value of the address is returned
   */
    public function getAddress($boolean)
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
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }
    
    /*
    *   returns the value of $mobileNumber
    */
    public function getMobileNumber()
    {
        return $this->mobileNumber;
    }
    
    /*
    *   returns the value of $emailAddress
    */
    public function getEmailAddress()
    {
        return $this->emailAddress;
    }
       
}

?>