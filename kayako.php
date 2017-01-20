<?php
date_default_timezone_set ('Europe/London');
$apiUrl = "http://ekeeper.kayako.com/api/index.php?e=/Tickets/Ticket";
$apiKey = "e774230f-f77b-9d74-fd08-43f34cd0edfd";
$salt = mt_rand();
$secretKey = "NjUwYTNlNjEtMDk3NS1lYzc0LWZkYTctMzU5NzhjMTA2NjYzOTMyZTIxZWYtOTk3MS00NWM0LTFkYzktZWM2ZGJiMjgyZjQ4";
$signature = base64_encode(hash_hmac('sha256',$salt,$secretKey,true));
echo '<pre>';


//print_r($_SERVER['REQUEST_METHOD']);
//print_r($_SERVER['REQUEST_TIME']);

echo '</pre>';
if($_SERVER['REQUEST_METHOD']=='POST')
{
    
//    var_dump($_POST['subject']);
    try{
    
            $subject = "In bound call: ".$_POST['subject'];
            $fullname = "inbound call";
            $email = "support@ekeepergroup.com";
            $contentsDate = date("d/m/Y");
            $contents = $contentsDate.': '.trim($_POST['contents']);
            $departmentid = "2";
            $ticketstatusid = $_POST['status'];//"1";
            $ticketpriorityid = "1";
            $tickettypeid = "1";
            $staffid = trim($_POST['staff']);
            $ownerstaffid = trim($_POST['staff']);
            $company =$_POST['company'];
            $post_data = array('subject' => $subject,
                               
            'fullname' => $fullname,
            'ulxvszyap1p6' => $company,                
            'email' => $email,
            'contents' => $contents,
            'departmentid' => $departmentid,
            'ticketstatusid' => $ticketstatusid,
            'ticketpriorityid' => $ticketpriorityid,
            'tickettypeid' => $tickettypeid,
            'staffid' => $staffid,
            'ownerstaffid' =>$ownerstaffid,
            'apikey' => $apiKey,
            'salt' => $salt,
			'<Company Name>' =>	$_POST['company'],
            'signature' => $signature);
			

            $post_data = http_build_query($post_data, '', '&');
            echo '<pre>';
            var_dump($post_data);

            $curl = curl_init($apiUrl);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_URL, $apiUrl);
            curl_setopt($curl, CURLOPT_HEADER, false);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);

//                var_dump($curl);

            $response = curl_exec($curl);  
            var_dump($response);


            curl_close($curl);

        }
        catch(Exception $e)
        {
            echo $e;
    }
}


//    echo 'failed';


    
    
// HTML form:




//$xml = simplexml_load_string($response, '<SimpleXMLElement>', LIBXML_NOCDATA);
//echo "<pre>".print_r($xml, true)."</pre>";
//echo '</pre>';
?>

<html><body>
    
    <form method="POST" name="callForm" action="kayako.php" >
        
       
            
            <label>
                Subject:    
            </label>
                <input type="text" name="subject"><br/>
          
            <label>
                Staff Member:
            </label>
            <select name="staff">
              <option value="0">Not specified</option>
                <option name="charlie" value="11">charlie</option>
              <option value="3">adam</option>
              <option value="2">jordan</option>
              <option value="10">Dan</option>
              <option value="5">Development</option>
            </select>
     
        <br/>
        <Label>
            Customer Name:
        </Label>
        <input type="text" name="customer"/><br/>
        <label>
            Company name:
        </label><br/>
        <textarea name="company" rows="10" col="10000"></textarea><br/>
        <label>
            Notes:
        </label><br/>
        <input type="text" id="contents" name="contents" value=""><br/>
        <label>
            Select ticket status:
        </label><br/>
         <input type="radio" name="status" value="45"> New<br>
        <input type="radio" name="status" value="44" checked> Completed<br>
  
<!--        <textarea row="30" col="100" name="contents" >asdasdasd</textarea><br/>-->
        <input type="submit">
<!--        <input type="reset" value="clear">-->
    
    
    
    </form>
    </body></html>




