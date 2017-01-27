<?php
// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();

$session =& JFactory::getSession();
$db =& JFactory::getDBO(); 
$query2 = "SELECT ".$db->nameQuote('mk_id').", `name` FROM ".$db->nameQuote('cf_brokers')." WHERE ".$db->nameQuote('available')." = ".$db->quote('1')." AND team = 'Premier Only' ORDER BY ".$db->nameQuote('date_time')." LIMIT 1";

$db->setQuery($query2);
$results = $db->loadAssoc();
$result = $results['mk_id'];
$name = $results['name'];

if ($result !="") {
    $query = "UPDATE cf_brokers SET `date_time` = NOW() WHERE `mk_id` = $result";
    $db->setQuery($query);
    $db->query(); 
}


$fd = JRequest::getVar('cf_capital___further_details');
if (is_array($fd)) {
    $further_details = $fd[0];
} else {
    $further_details = $fd;
}

//$serverreferrer = $_SERVER['HTTP_REFERER'];
$serverreferrer = JRequest::getVar('cf_capital___page');
$formreferrer = JRequest::getVar('cf_capital___referer');

$post_data['Title1'] = JRequest::getVar('cf_capital___title');
$post_data['Forename1'] = ucfirst(JRequest::getVar('cf_capital___first_name'));
$post_data['Surname1'] = ucfirst(JRequest::getVar('cf_capital___last_name'));
//$post_data['AdvisorPK'] = $result;
$post_data['AdvisorPK'] = $result;
$post_data['StagePK'] = '72';
$moborland = substr(preg_replace("/[^0-9]/","",JRequest::getVar('cf_capital___mobile_number')), 0, 2);  
if($moborland =="07"){
    $post_data['MobilePhone'] = preg_replace("/[^0-9]/","",JRequest::getVar('cf_capital___mobile_number'));
} else {
    $post_data['DayPhone'] = preg_replace("/[^0-9]/","",JRequest::getVar('cf_capital___mobile_number'));        
}
$post_data['NextStageDue'] = JRequest::getVar('cf_capital___date_time');
$post_data['Email'] = JRequest::getVar('cf_capital___email_address'); 
$confirm = JRequest::getVar('cf_capital___confirm'); 

//$campaign = JRequest::getVar('cf_campaign', JRequest::getVar('cf_capital___campaign', ''));
//if ($campaign != '') {
//    $campaign = " | " . $campaign;
//}

$channel = $session->get('channel', '');
$campaign = $session->get('campaign', '');
$group = $session->get('group', '');
$keyword = $session->get('keyword', '');
$type = $session->get('type', '');
$ctype = $session->get('ctype', '');
$details = $session->get('details', '');

$post_data['FFVersionPK'] = '1';

$post_data['FFQuestionPK[1]'] = '12089';
$post_data['FFAnswer[1]'] = 'Web';
$post_data['FFQuestionPK[3]'] = '12101';
$post_data['FFAnswer[3]'] = date("d/m/Y");
$post_data['FFQuestionPK[4]'] = '12102';
$post_data['FFAnswer[4]'] = date("H:i:s");
$post_data['FFQuestionPK[5]'] = '12103';
$post_data['FFAnswer[5]'] = $further_details;
$post_data['FFQuestionPK[6]'] = '12028';
$post_data['FFAnswer[6]'] = $serverreferrer;

if ($details != '') {
    $post_data['FFQuestionPK[2]'] = '12091';
    $post_data['FFAnswer[2]'] = 'PPC';
    $post_data['FFQuestionPK[7]'] = '12090';
    $post_data['FFAnswer[7]'] = $channel;
    $post_data['FFQuestionPK[8]'] = '12026';
    $post_data['FFAnswer[8]'] = $keyword;
    $post_data['FFQuestionPK[9]'] = '12029';
    $post_data['FFAnswer[9]'] = $campaign;
    $post_data['FFQuestionPK[10]'] = '14552';
    $post_data['FFAnswer[10]'] = 'Premier Only';
    $post_data['FFQuestionPK[11]'] = '15406';
    $post_data['FFAnswer[11]'] = $name;
    $post_data['FFQuestionPK[12]'] = '15405';
    $post_data['FFAnswer[12]'] = '23449';
    $details = ' | ' . $details;
} else {
    $post_data['FFQuestionPK[2]'] = '12091';
    $post_data['FFAnswer[2]'] = 'Organic';
    $post_data['FFQuestionPK[7]'] = '14552';
    $post_data['FFAnswer[7]'] = 'Premier Only';
    $post_data['FFQuestionPK[8]'] = '15406';
    $post_data['FFAnswer[8]'] = $name;
    $post_data['FFQuestionPK[9]'] = '15405';
    $post_data['FFAnswer[9]'] = '23449';
}

$post_data['ActionText'] = "DETAIL: " . $further_details . " | SOURCE: This is a  " . $formreferrer . ". Page details " . $serverreferrer . $details;
$post_data['ActionPK'] = '12';

$post_data['submit'] = 'submit';
//traverse array and prepare data for posting (key1=value1)
foreach ( $post_data as $key => $value) {
    $post_items[] = $key . '=' . $value;
}
//create the final string to be posted using implode()
$post_string = implode ('&', $post_items);

if(!($channel == 'bing' && $campaign == 'Advisers and Brokers:AdCenter')) {

    //create cURL connection
    $curl_connection = curl_init('http://secure.mortgagekeeperonline.com/CapitalFortune/php/NewMortgageQuickDetails.php');
    //curl_init('http://secure.mortgagekeeperonline.com/CapitalFortune/php/philsoftforge.php');
    
    //set options
    curl_setopt($curl_connection, CURLOPT_CONNECTTIMEOUT, 45);
    curl_setopt($curl_connection, CURLOPT_USERAGENT,
      "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)");
    curl_setopt($curl_connection, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl_connection, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl_connection, CURLOPT_FOLLOWLOCATION, 1);
    //set data to be posted
    curl_setopt($curl_connection, CURLOPT_POSTFIELDS, $post_string);
    //perform our request
    $result = curl_exec($curl_connection);
    //show information regarding the request
    //echo"<pre>";
    //echo $result;
    //print_r(curl_getinfo($curl_connection));
    //echo"</pre>";
    //echo curl_errno($curl_connection) . '-' .
     curl_error($curl_connection);
    //close the connection
    curl_close($curl_connection);
    $to = 'phil@softforge.co.uk';
    $subject = "premier-only-php";
    $message =  $post_string;

// Send
    mail($to, $subject, $message);
}

?> 
