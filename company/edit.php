<?php


$servername = "localhost";
        $username = "root";
        $password = ""; 
        $dbname = "job";
        $conn = new mysqli($servername, $username, $password, $dbname);

        if($conn ->connect_error){
            die("Failed! ". $conn->connect_error);
        }
session_start();

$user = $_SESSION['name'];

echo $user;

$sql = "select * from position where posid=$_GET[posid]";  
$result = $conn->query($sql);
$res = $result->fetch_assoc()   
 
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
        
            <form action="update.php" method="GET">
                <label  hidden for="posid">Don't edit id <span class = "error-msg" >*<span></label>
                <input   type="hidden" class ="input-div-nn" id="posid"  name = "posid" value="<?php echo $res['posid'];?>">

                <label  hidden for="compid">Don't edit id <span class = "error-msg" >*<span></label>
                <input   type="hidden" class ="input-div-nn" id="compid"  name = "compid" value="<?php echo $res['compid'];?>">

                <label for="jobtitle">jobtitle<span class = "error-msg" >*<span></label>
                <input type="text" class ="input-div-nn" id="jobtitle" name = "jobtitle" value="<?php echo $res['jobtitle'];?>">

                <label for="requirment">requirment<span class = "error-msg" >*<span></label>
                <input type="text" class ="input-div-nn" id="requirment" name = "requirment" value="<?php echo $res['requirment'];?>">

                <label for="salary">salary<span class = "error-msg" >*<span></label>
                <input type="text" class ="input-div-nn" id="salary" name = "salary" value="<?php echo $res['salary'];?>">

                <label for="status">status<span class = "error-msg" >*</label>
                <select class ="input-div-nn" name="status" id="status">
                    <option value= "active" selected >active</option>
                    <option value= "freeze">freeze</option>
                </select>
             

                <input type="submit" class="submit" value="Update Message">
            </form>
        </div>
        <div class="col-6"><button onclick="window.location.href = 'dashboard.php'" class="send">Return</button></div>
        </div>
    </div>
</body>
</html>





