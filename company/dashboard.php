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
            $sql = "SELECT compid, username,compname,compemail,comptel,compaddr FROM `company`";              
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
  <th>Id</th>
    <th>username</th>
    <th>compname</th>
    <th>compemail</th>
    <th>comptel</th>
    <th>compaddr</th>
    <th>Action</th>
  </tr>
 <?php 

 
 foreach($array_result as $value){?>
  
  <tr>
    <td><?php echo $value['compid'];?></td>
    <td><?php echo $value['username'];?></td>
    <td><?php echo $value['compname'];?></td>
    <td><?php echo $value['compemail'];?></td>
    <td><?php echo $value['comptel'];?></td>
    <td><?php echo $value['compaddr'];?></td>
    <td><a href="delete.php?id=<?php echo $value['id'];?>" >Delete</a></td>
  </tr>
 <?php
}?>
 
</table>

</body>
</html>