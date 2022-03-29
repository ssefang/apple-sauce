<?php 

include '../db/database.php';


session_start();
$username = $_SESSION['username'];
ApplyPosition();

function ApplyPosition (){
    global $conn;

    $posid =  $_POST['posid'];
    $userid =  $_POST['userid'];
   
  $sql = "Select * from application where userid = '$userid' and posid = ' $posid' ";
  $result = $conn->query($sql);

    if($result->num_rows >0){

    return false;    

    } else{
        $sql_insert = "INSERT INTO application (userid, posid, appstat) VALUES ('$userid', '$posid', 'apply')"; 
            
        if($conn->query($sql_insert)){

            header("Location: user_dashboard.php");
            return true; 

        }else{
            echo "error".$conn->connect_error;
        }
        $conn->close();
    }
  }



?>