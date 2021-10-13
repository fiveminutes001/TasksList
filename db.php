<?php

//display errors
error_reporting(E_ALL);
ini_set('display_errors', 'On');

//get DB details
include 'php/connect.php';

//get the search input from URL
$q = $_GET['q'];
$dev = $_GET['dev'];

$b = $_POST['b'];
$c = $_POST['c'];
var_dump($c);
var_dump($b);
//getting data from DB
include 'php/getData.php';

//output the response
echo $response;

?>
