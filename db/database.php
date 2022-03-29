<?php

$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "job";
$conn = new mysqli($servername, $username, $password, $dbname);
if($conn ->connect_error){
    die("Failed! ".$conn->connect_error);
}

?>