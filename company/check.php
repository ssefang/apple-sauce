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

$sql = "select * from application where appid=$_GET[appid]";  
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
        
            <form action="status.php" method="GET">
                <label  hidden for="appid">Don't edit id <span class = "error-msg" >*<span></label>
                <input   type="hidden" class ="input-div-nn" id="appid"  name = "appid" value="<?php echo $res['appid'];?>">

                <label  hidden for="userid">Don't edit id <span class = "error-msg" >*<span></label>
                <input   type="hidden" class ="input-div-nn" id="userid"  name = "userid" value="<?php echo $res['userid'];?>">

                <label  hidden for="posid">Don't edit id <span class = "error-msg" >*<span></label>
                <input   type="hidden" class ="input-div-nn" id="posid"  name = "posid" value="<?php echo $res['posid'];?>">


                <label for="appstat">choose status<span class = "error-msg" >*</label>
                <select class ="input-div-nn" name="appstat" id="appstat">
                    <option value= "accept" selected >accept</option>
                    <option value= "refuse">refuse</option>
                </select>
             

                <input type="submit" class="submit" value="Update Message">
            </form>
        </div>
        <div class="col-6"><button onclick="window.location.href = 'dashboard.php'" class="send">Return</button></div>
        </div>
    </div>
</body>
</html>


