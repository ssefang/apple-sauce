<?php 

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
            $sql = "SELECT position.posid,position.compid,company.compname, position.jobtitle, position.requirment, position.salary, position.status FROM `position` JOIN `company` ON position.compid=company.compid WHERE company.username='$_SESSION[name]';";              
            $result = $conn->query($sql);
            if($result->num_rows >0){ 
                $array_result = $result->fetch_all(MYSQLI_ASSOC); 
             
             }
            else{
                echo "error".$conn->connect_error;
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
    <th>posid</th>
    <th>compid</th>
    <th>compname</th>
    <th>jobtitle</th>
    <th>requirment</th>
    <th>salary</th>
    <th>status</th>
    <th>Action</th>
  </tr>
 <?php 

 
 foreach($array_result as $value){?>
  
  <tr>
    <td><?php echo $value['posid'];?></td>
    <td><?php echo $value['compid'];?></td>
    <td><?php echo $value['compname'];?></td>
    <td><?php echo $value['jobtitle'];?></td>
    <td><?php echo $value['requirment'];?></td>
    <td><?php echo $value['salary'];?></td>
    <td><?php echo $value['status'];?></td>
    <td><a href="update.php?posid=<?php echo $value['posid'];?>" >Update</a>|<a href="update.php?id=<?php echo $value['posid'];?>" >View</a></td>
  </tr>
 <?php
}?>
 
</table>
<a href="position.php?compid=<?php  echo $value['compid'];?>" >Post a new position</a>
</body>
</html>