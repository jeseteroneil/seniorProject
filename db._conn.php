<?php

// Initialize the session
session_start();
 
// if user is logged in redirect to logged in page
/*
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: "); // need to add page user is redirected to.
    exit;
}
*/
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
//connect to db
$conn = new mysqli("localhost","root","","users");
$msg="connecting...";

echo $msg;

//check connection
if($conn){
    echo 'Connected ';
} else{
    echo 'Not connected', mysqli_connect_error();
}

?>