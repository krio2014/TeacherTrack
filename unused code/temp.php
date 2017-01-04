<?php

require_once "DataObject.php";
require_once "MKCustomerLicenceObject.php";
require_once "CryptObject.php";

class MKCustomerObject extends DataObject{

    var $myColumns = array( MKCustomerPK=>array(ColumnType=>"Key", DataType=>"Numeric", FriendlyName=>"MKCustomerPK"),
                            MKCustomerName=>array(ColumnType=>"", DataType=>"String", FriendlyName=>"Customer Name"),
                            AgreementNumber=>array(ColumnType=>"", DataType=>"String", FriendlyName=>"Agreement Number"),
							MacAddress=>array(ColumnType=>"", DataType=>"String", FriendlyName=>"MacAddress"),
							MKKey=>array(ColumnType=>"", DataType=>"String", FriendlyName=>"MK Key"),
							MessageLimit=>array(ColumnType=>"", DataType=>"String", FriendlyName=>"Message Limit"),
							MKTextMessaging=>array(ColumnType=>"", DataType=>"String", FriendlyName=>"Texting Enabled"),
							
                            );
    var $currentRow;

    function MKCustomerObject($dbobject, $userPK) {
        # Just pass it on to our parent
        $this->DataObject($dbobject, $userPK, "mkcustomer");
        
        $this->setAuditable(true);
    }

    /*
    function which simply checks whether the mkcustomer passed in is billable for text messages or not
    return true if they are, false if not
    */
    function isBillable($mkCustomerPK=0)
    {
    	if($mkCustomerPK == 0) return -1;
    	
    	$sql = "SELECT * FROM mkcustomer WHERE mkcustomerPK = $mkCustomerPK AND billable=1";
    	#die($sql);
        if (DB::isError($this->res = $this->myDbobject->query($sql))){
            die (DB::errorMessage($res). " - ". $sql);
        }
                
        if($this->res->result)
        {
        	if(mysql_num_rows($this->res->result) <= 0) return false;
	        else return true;
	} else
	{
		#something has gone wrog
		return false;
	}
    }
    
    function findMKCustomers() {
        $sql = "SELECT * from mkcustomer Order By MKCustomerPK desc";
        if (DB::isError($this->res = $this->myDbobject->query($sql))){
            die (DB::errorMessage($this->res). " - ". $sql);
        }
    }    
    function findMKCustomer($mkCustomerPK) {
        $sql = "SELECT * from mkcustomer where MKCustomerPK = $mkCustomerPK";
        if (DB::isError($this->res = $this->myDbobject->query($sql))){
            die (DB::errorMessage($this->res). " - ". $sql);
        }
    }

    function findMKCustomerByAgreement($mkCustomerAgreement) {
        $sql = "SELECT * from mkcustomer where AgreementNumber = '$mkCustomerAgreement'";
        if (DB::isError($this->res = $this->myDbobject->query($sql))){
            die (DB::errorMessage($this->res). " - ". $sql);
        }
    }
	
	function findMKCustomerByKeyword($keyword){
		$sql = "SELECT * from mkcustomer where match (MKCustomerName, AgreementNumber) against ('$keyword' in boolean mode)";
		 if (DB::isError($this->res = $this->myDbobject->query($sql))){
            die (DB::errorMessage($this->res). " - ". $sql);
        }
	}

    function getMKCustomer(){
        if ($this->currentRow = $this->getData()) {
        }
        return $this->currentRow;
    }

	function insertMKCustomer($valuesArray){
		$this->currentRow = $valuesArray;
 		$errorArray = $this->insertData($this->currentRow);
 		$this->currentRow['MKCustomerPK'] = $this->getLastInsertedID();
		return $errorArray;
	}

    function updateMKCustomer($valuesArray, $prevValuesForAudit = null) {
        # These are just the basic updates to my parent.
#        die(print_r($valuesArray));
       $this->updateData($valuesArray, null, $prevValuesForAudit);
    }

    function deleteMKCustomer($mkCustomerPK) {
        if (isset($mkCustomer)) {
            $theSql = "delete from mkcustomer where MKCustomerPK = $mkCustomerPK";
            # Execute the query.
            $this->myDbobject->query($theSql);
        }
    }
    
    function getLicenceArray() {
        $myMKCustomerLicenceObject = new MKCustomerLicenceObject($this->myDbobject, $this->userPK);
        $myMKCustomerLicenceObject->findMKCustomerLicenceByCustomer($this->currentRow['MKCustomerPK']);
        while ($thisRow = $myMKCustomerLicenceObject->getMKCustomerLicence()) {
            $returnArray[$thisRow['LicenceFeatureType']] = $thisRow;
        }
        return $returnArray;
    }
    
    function getLicenceArrayString($encryptIt = true) {
        # Use this to generate the string
        $thisArray = $this->getLicenceArray();
        if (is_array($thisArray)) {
            foreach ($thisArray as $thisOne) {
                # Remove some of these bits and pieces
                unset($thisOne['MKCustomerPK']);
                $thisOne['FeatureExpiryDate'] = $thisOne['FeatureExpiryDateRaw'];
                unset($thisOne['FeatureExpiryDateRaw']);
                $thisOne['LicenceStopDate'] = $thisOne['LicenceStopDateRaw'];
                unset($thisOne['LicenceStopDateRaw']);
                $resultArray[$thisOne['LicenceFeatureType']] = $thisOne;
            }
        } else {
            # They're not licenced for anything!
            $resultArray = array();
        }
            
        
#echo("<pre>");
#print_r($resultArray);
#echo("</pre>");

        #$encrypted = serialize($resultArray);
		$stuffToEncrypt = serialize($resultArray);
		if ($encryptIt) {
			$myCryptObject = new CryptObject();
			return $myCryptObject->encrypt($stuffToEncrypt);
		} else {
			return $stuffToEncrypt;
		}

    }
    
    function windLicenceDatesOn($howManyMonths = 1) {
        $quickArray = $this->getLicenceArray();
		
#print_r($quickArray);		
		
        if (is_array($quickArray)) {
			$proposedDate = BasicStuff::addMonthsToDate(BasicStuff::getTodaysSQLDateNoTime(), $howManyMonths);
			
            foreach($quickArray as $licType => $licValue) {
				$reformatFeatureExpiryDate = BasicStuff::ukDateToMySQL($licValue['FeatureExpiryDate']);

#echo("<br>the difference between $proposedDate and $reformatFeatureExpiryDate is ".BasicStuff::daysBetweenDates($proposedDate, $reformatFeatureExpiryDate));
				
				if (BasicStuff::daysBetweenDates($proposedDate, $reformatFeatureExpiryDate) > 0) {
			
#				if ($proposedDate > $reformatFeatureExpiryDate) {
					# If the proposed date *would* actually extend the licence then use that
					$licValue['FeatureExpiryDate'] = BasicStuff::SQLDateToUk($proposedDate);
#echo("<br>propsed date of $proposedDate would extend beyond ".$reformatFeatureExpiryDate." so we'll use that");				
				} else {
					# The proposed date won't actually move the existing licence forward so don't bother
				}
				
                #$licValue['FeatureExpiryDate'] = BasicStuff::addMonthsToDate(BasicStuff::getTodaysSQLDateNoTime(), $howManyMonths);
#echo("<br><br><pre>");
#print_r($licValue);
#echo("</pre>");
				if ($licValue['LicenceStopDate']) {
					# If this is a feature that expires....
					# Make it so you can't wind the feature expiry date beyond the stop date
					#if ($licValue['FeatureExpiryDate'] > $licValue['LicenceStopDate']) {

#echo("<br>Before reformat feature date is ".$licValue['FeatureExpiryDate']);

					$reformatFeatureExpiryDate = BasicStuff::ukDateToMySQL($licValue['FeatureExpiryDate']);
					$reformatLicenceStopDate = BasicStuff::ukDateToMySQL($licValue['LicenceStopDate']);
					
					#if ($licValue['FeatureExpiryDateRaw'] > $licValue['LicenceStopDateRaw']) {
					#if ($reformatFeatureExpiryDate > $reformatLicenceStopDate) {
					if (BasicStuff::daysBetweenDates($reformatFeatureExpiryDate, $reformatLicenceStopDate) > 0) {
#echo("<br>Not winding beyond stop!");
						$licValue['FeatureExpiryDate'] = $licValue['LicenceStopDate'];
					} else {				
#echo("<br>Feature expires ($reformatFeatureExpiryDate) before stop ($reformatLicenceStopDate)<br>Before reformat feature date is ".$licValue['FeatureExpiryDate']);
					}
#echo("<br>Therefore expiry date is ".$licValue['FeatureExpiryDate']);
				}				
                $newArray[$licType] = $licValue;
            }
        } else {
            # They aren't licenced for anything!
            $newArray = array();
        }
        $this->setLicenceArray($newArray);
    }
    
    function setLicenceArray($newLicenceArray) {
        # First delete all the existing ones.
        $myMKCustomerLicenceObject = new MKCustomerLicenceObject($this->myDbobject, $this->userPK);
        $myMKCustomerLicenceObject->deleteAllMKCustomerLicences($this->currentRow['MKCustomerPK']);
        # Now add the new ones (if there are any!)
        
#die(print_r($newLicenceArray));
        
        if (isset($newLicenceArray)) {
            foreach ($newLicenceArray as $licType => $licValues) {
                $licValues['MKCustomerPK'] = $this->currentRow['MKCustomerPK'];
#if ($licValues['NoOfUsers'] == null) {    die("it's null");}
#if ($licValues['NoOfUsers'] == 0) {    die("it's zero");}
#echo("<p>Lic values are:<pre>");
#print_r($licValues);
#echo("</p>");
                $myMKCustomerLicenceObject->insertMKCustomerLicence($licValues);
            }
        }

    }
	
	function recordRelicenceRequest($version, $lastLoginArray) {
		$theSql = "insert into mkrelicencerequest (MKCustomerPK, DateTimeCreated, VersionNumber) values";
		$theSql.= "(".$this->currentRow['MKCustomerPK'].", '".BasicStuff::getTodaysSQLDate()."', $version)";
		$this->myDbobject->query($theSql);

		# Uh oh, database indepedance warning!
		$theAutoNumber = mysql_insert_id();

		if (is_array($lastLoginArray)) {
			foreach ($lastLoginArray as $userid => $lastlogin) {
				$theSql = "insert into mklastlogin (MKRelicenceRequestPK, UserID, LastLogin) values";
				$theSql.= "($theAutoNumber, '$userid', '$lastlogin')";
				$this->myDbobject->query($theSql);
			}
		}
	
	}
	
}

?>
