<?php

//display errors
error_reporting(E_ALL);
ini_set('display_errors', 'On');

//get DB details
include 'php/connect.php';

//get the search input from URL
$q = $_GET['q'] ? $_GET['q'] : null;
$dev = $_GET['dev'] ? $_GET['dev'] : null;
$a = $_POST['a'] ? $_POST['a'] : null;
$b = $_POST['b'] ? $_POST['b'] : null;
//getting data from DB
include 'php/getData.php';

//output the response
echo $response;

?>
