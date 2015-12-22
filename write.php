<?php

$t=time();

$xmasname = $_POST['xmasname'];
$confirm = $_POST['confirm'];
$lat = $_POST['lat'];
$long = $_POST['long'];
$ip = $_POST['ip'];
$other = $_POST['other'];
$jsonString = file_get_contents('data.json');
$data = json_decode($jsonString, true);
$len = count($data);

for ($x = 0; $x < $len; $x++) {
	if ($data[$x]["xmasname"] == $xmasname) {
		$data[$x]["confirm"] = $confirm;
		$data[$x]["lat"] = $lat;
		$data[$x]["long"] = $long;
		$data[$x]["ip"] = $ip;
		$data[$x]["other"] = $other;
	}
}

$newJsonString = json_encode($data);
file_put_contents('data.json', $newJsonString);

	
$myfile = fopen("alldata.txt", "a") or die("Unable to open file!");
$txt = date("Y-m-d",$t)." - ".$xmasname." - ".$confirm." - ".$lat." - ".$long." - ".$ip." - ".$other;
fwrite($myfile, $txt);
fclose($myfile);


?>