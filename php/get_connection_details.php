<?php

//ERROR DISPLAY
//error_reporting(E_ALL);
//ini_set('display_errors', 'On');

//VARS - NONE

//INCLUDES - NONE

//FUNCTIONS

//OPENING FAR TEXT FILE
// - GETS PATH'S DIRECTORY
// - OPENS FAR FILE AND COPIES DB DETAILS TO ARRAY
// - RETURNS DB DETAILS ARRAY

function getfile($path)
{
    //VARS
    $dir = 'taskslist';
    $main_path = '../../../ocartdata/storage/vendor/react/promise/tests/PromiseTest/';
    //OPENING FILE
    $myfile = fopen($main_path . $dir . "/$path.txt", "r") or die("Unable to open file!");
    //GETTING FILE CONTENT//OUTPUT 01
    $r = file_get_contents($main_path . $dir . "/$path.txt");
    //CLOSING FILE
    fclose($myfile);
    //SPLITTING BY SPACES
    $p = explode("\n", $r);
    //RETURN DB DETAILS ARRAY
    return $p;
}
