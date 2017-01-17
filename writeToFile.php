<?php
date_default_timezone_set('UTC');
/*
* testinglog takes an array of strings that are the results of some tests performed from an external file.
* Each element in the array is seperated and output to a file called testingLog.txt
*/
function testLog($array){

//var_dump($array);
//$myfile = fopen("testingLog.txt", "w") or die("Unable to open file!");
	file_put_contents("Log.txt", "\r\n=====Begin test====\r\n", FILE_APPEND);
	foreach ($array as &$value) 
	{

		$date =  date("Y-m-d H:i:s");   
		$text = $date.': '.$value."\r\n";
		file_put_contents("Log.txt", $text, FILE_APPEND);
	}
	file_put_contents("Log.txt", "=====end test====", FILE_APPEND);
}

?>