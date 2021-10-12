<?php
function getfile($path)
{
	$dir = 'taskslist';
	$main_path = '../../../../ocartdata/storage/vendor/react/promise/tests/PromiseTest/';
	($myfile = fopen($main_path . $dir . "/$path.txt", 'r')) or die('Unable to open file!');
	$r = file_get_contents($main_path . $dir . "/$path.txt");
	fclose($myfile);
	$p = explode("\n", $r);
	return $p;
}

$path = 'data';
$db_details = getfile($path);

$host = $db_details[0];
$username = $db_details[1];
$password = $db_details[2];
$db = $db_details[3];

//CREATING CONNECTION
$con = mysqli_connect($host, $username, $password, $db);

//CHECKING CONNECTION
if ($con) {
	$check_mark = '<i class="fas fa-check" style="font-size:12px;color:green;"></i>';
} else {
	$check_mark = '<i class="fas fa-times" style="font-size:12px;color:red;"></i>';
}
echo $check_mark;
//SELECTING DATABASE
mysqli_select_db($con, $db);

//ENABLING HEBREW
mysqli_query($con, 'SET character_set_client=utf8mb4');
mysqli_query($con, 'SET character_set_connection=utf8mb4');
mysqli_query($con, 'SET character_set_database=utf8mb4');
mysqli_query($con, 'SET character_set_results=utf8mb4');
mysqli_query($con, 'SET character_set_server=utf8mb4');

//SETTING TIME
$sql_Time = "SET time_zone = '+03:00';";
$query = mysqli_query($con, $sql_Time);
