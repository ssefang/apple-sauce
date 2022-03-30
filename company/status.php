<?php

session_start();

$id = $_GET['appid'];
echo $id;

// $compid = $_GET["compid"];
// $jobtitle = $_GET["jobtitle"];
// $requirment = $_GET["requirment"];
// $salary = $_GET["salary"];
$appstat = $_GET["appstat"];

    $servername = "localhost";
    $username = "root";
    $password = ""; 
    $dbname = "job";
    $conn = new mysqli($servername, $username, $password, $dbname);

    if($conn ->connect_error){
        die("Failed! ". $conn->connect_error);
    }
    
    $sql = "UPDATE `application` SET `appstat` = '$appstat' WHERE `application`.`appid` = $id;";
   

    if($conn->query($sql) === true){
            echo "Update done";        
       } else{
            echo "error".$conn->connect_error;    
       }
     
    $conn->close();
	// header("Location:edit.php");
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update</title>
  <link rel="stylesheet" href="index.css">
</head>
<body>
    <div class="container">
        <div class="maindiv">
        <div class="col-6">

        </div>
        <div class="col-6"><button onclick="window.location.href = 'dashboard.php'" class="send">Return</button></div>
        </div>
    </div>
</body>
</html> 