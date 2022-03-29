<?php

include '../db/database.php';
include "decryption.php";

session_start();
$userid = $_SESSION['userid'];
$username = $_SESSION['username'];




$error_log['password']= $error_log['name'] = $error_log['email'] = $error_log['tel'] = $error_log['success']='';
$password = $name= $email = $tel = $success = $education = $experience = $encrypaw ='';

if (!empty($err) && isset($err)){
  $error_log = unserialize($err);
}


$sql = "select * from user where userid = '$userid'";  
$result = $conn->query($sql);
if($result->num_rows==1 ){
    $row = $result->fetch_assoc();

    $userid = $row['userid'];
    $username = $row['username'];
    $password = decryption($row['password']);
    $name = $row['name'];
    $email= $row['email'];
    $tel = $row['tel'];
    $education = $row['education'];
    $experience =$row['experience']; ;

}else{
    echo "error".$conn->connect_error;
}

?>


<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <title>Edit Center</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" 
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/user_update.css">

</head>

<body>
    <main class = "container">
		
        <h3>Edit Center</h3>
        <h3><?php echo $error_log['success'];?></h3>

        <!--must use $row['userid'] -->
        <form action="<?php echo'user_update.php?userid='.$row['userid'] ?>" method="post" id="updateform">

        <!-- <form action="user_update.php" method="post" id="updateform"> -->
      
            <div class="form-group">
                <label for="username">User code:</label>
                <input type="text" class="form-control" id="username" name="username" value="<?php echo $username; ?>" disabled="disabled">
            </div>

            <div class="form-group">
              <label for="password">Password: <span class = "error-msg" >*<span></label>
              <input type="password" class="form-control" id="password" name="password" value="<?php echo $password; ?>">
              <p class = "error-msg"><?php echo $error_log['password']; ?></p>
            </div>


            <div class="form-group">
              <label for="name">Full Name : <span class = "error-msg" >*<span></label>
              <input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>">
              <p class = "error-msg"><?php echo $error_log['name']; ?></p>
            </div>

            <div class="form-group">
              <label for="email">Email: <span class = "error-msg" >*<span></label>
              <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
              <p class = "error-msg"><?php echo $error_log['email']; ?></p>
            </div>

            <div class="form-group">
              <label for="tel">Mobile Number: <span class = "error-msg" >*<span></label>
              <input type="text" class="form-control" id="tel" name="tel" value="<?php echo $tel; ?>">
              <p class = "error-msg"><?php echo $error_log['tel']; ?></p>
            </div>

            <div class="form-group">
              <label for="education">Education</label>
              <textarea class="form-control" id="education" name="education" row="10"><?php echo $education; ?></textarea>
            </div>

            <div class="form-group">
              <label for="experience">Experience </label>
              <textarea class="form-control" id="experience" name="experience"  row="10"><?php echo $experience; ?></textarea>
            </div>

            <input type="submit" class="send" value="Update My CV" >
        </form> 
        
        <br/>
        <button onclick="window.location.href = 'user_dashboard.php'" class="login">Go Back</button>
    </main>
</body>
</html>

<script src="../js/user_dashboard.js"></script>
