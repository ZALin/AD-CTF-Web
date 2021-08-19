<?php
require('config.php');

$ip = $_SERVER['REMOTE_ADDR'];
if($ip === '127.0.0.1'){
	echo "You are localhost!?\n";
	$flag = $resource_dir . "/flag.php";
	die(system("cat $flag"));
}
else{
	die("Your IP : $ip <br/>Only localhost can access this page<br/><br/>Maybe You should try another way to get the flag?<br/>Hint, Search Engines Robots may found the flag");
}
?>