<?php 
error_reporting(0);
session_start();
echo "Welcome ".$_SESSION['name'];


$array_result = InsertValue();

    function InsertValue(){
            $array_result = array();
            $servername = "localhost";
            $username = "root";
            $password = ""; 
            $dbname = "job";
            $conn = new mysqli($servername, $username, $password, $dbname);
            if($conn ->connect_error){
                die("Failed! ". $conn->connect_error);
            }
           
            $sql = "SELECT user.name,user.email,user.tel,user.education,user.experience, a.appstat FROM `application` a JOIN `user` ON user.userid= a.userid JOIN `position` ON position.posid=a.posid WHERE position.posid=$_GET[posid];";              
            $result = $conn->query($sql);
            if($result->num_rows >0){ 
                $array_result = $result->fetch_all(MYSQLI_ASSOC);             
             }
            else{
                echo "No application".$conn->connect_error;
                }
                $conn->close();
                return $array_result;
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    
<table id="customers">
  <tr>
    <th>name</th>
    <th>email</th>
    <th>tel</th>
    <th>education</th>
    <th>experience</th>
    <th>status</th>
    <th>Action</th>
  </tr>
 <?php 

 
 foreach($array_result as $value){?>
  
  <tr>
    <td><?php echo $value['name'];?></td>
    <td><?php echo $value['email'];?></td>
    <td><?php echo $value['tel'];?></td>
    <td><?php echo $value['education'];?></td>
    <td><?php echo $value['experience'];?></td>
    <td><?php echo $value['status'];?></td>
    <td><a href="application.php?id=<?php echo $value['posid'];?>" >check</a></td>
  </tr>
 <?php
}?>
 
</table>

</body>
</html>