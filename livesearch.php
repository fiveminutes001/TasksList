<?php

//display errors
//error_reporting(E_ALL);
//ini_set('display_errors', 'On');

//get DB details
include "php/connect.php";

//get the search input from URL
$q=$_GET["q"];
$dev=$_GET["dev"];

//getting data from DB
include 'php/getData.php';

//output the response
echo $response;

?>