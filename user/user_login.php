
<?php

include '../db/database.php';
include "decryption.php";

$error_log['password'] = $error_log['username']= $error_log['success']='';
$username = $password = '';

if(isset($_POST)&&!empty($_POST)){

	if(empty($_POST["username"])){
		$error_log['username'] = "Need username";
	}else{
		$username = $_POST["username"];
	}
	if(empty($_POST["password"])){
		$error_log['password'] = "Need password";
	}else{
		$pass = $_POST["password"];
	}
	if($_POST["username"]!='' && $_POST["password"]!=''){
		$error_log['success'] =  $_POST["username"];
		$username = $password = '';
	}
} 


if(isset($error_log['success']) && !empty($error_log['success'])){
    UserLogin();
    $username = $password = '';

}

function UserLogin(){
    global $conn;
    
    $sql = "select * from user where username='$_POST[username]'";  

    $result = $conn->query($sql);

    if($result->num_rows >0){

        $row = $result->fetch_assoc(); 

        $decryptpwd = decryption($row['password']);

        echo $decryptpwd;

        if($_POST["password"]== $decryptpwd){

            session_start();
            $_SESSION['userid'] = $row ['userid'];
  
            $_SESSION['username'] = $_POST['username'];

            header("Location: user_dashboard.php");

            die();   

        } else{

            global $error_log;

            $error_log['password'] = 'Incorrect password try again!';  
        }
    }else{
        echo "error".$conn->connect_error;
    }    
         $conn->close();
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
    <title>Login</title>
    <link rel="stylesheet" href="../css/user_login.css">

</head>

<body>
    <main class = "container">
        <br/><br/>
        <form action="<?php echo $_SERVER['PHP_SELF']  ?>" method="post">
            <div class="form-group">
                <label for="username">Username <span class = "error-msg" >*<span></label>
                <input type="text" class="form-control" id="nom" name="username" value="<?php echo $username; ?>">
                <p class = "error-msg"><?php echo $error_log['username']; ?></p>
            </div>

            <div class="form-group">
              <label for="password">Password <span class = "error-msg" >*<span></label>
              <input type="password" class="form-control" id="password" name="password" value="<?php echo $password; ?>">
              <p class = "error-msg"><?php echo $error_log['password']; ?></p>
            </div>

            <input type="submit" class="log" value="User Login ">
        </form>
        <br/>
        <button onclick="window.location.href = 'user_register.php'" class="reg">Not a Member</button>

    </main>
</body>
</html>


