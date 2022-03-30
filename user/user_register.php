

<?php

include '../db/database.php';
include "encryption.php";

$error_log['username'] = $error_log['password']= $error_log['name'] = $error_log['email'] = $error_log['tel'] = $error_log['success']='';

$username = $password = $name= $email = $tel = $success = $education = $experience = $encrypaw ='';

if(isset($_POST)&&!empty($_POST)){

	if(empty($_POST["username"])){
		$error_log['username'] = "Need chose a User Code";
	}else{
		$username = $_POST["username"];
	}
	if(empty($_POST["password"])){
		$error_log['password'] = "Need set your password";
	}else{
		$password = $_POST["password"];
    }
	if(empty($_POST["name"])){
		$error_log['name'] = "Need your full name";
	}else{
		$name = $_POST["name"];
	}
    if(empty($_POST["email"])){
		$error_log['email'] = "Need enter your email";
	}else{
		$mail = $_POST["email"];
	}
    if(empty($_POST["tel"])){
		$error_log['tel'] = "Need Your Phone Number";
	}else{
		$mail = $_POST["tel"];
	}
	if($_POST["username"]!='' && $_POST["password"]!=''&& $_POST["name"]!=''&& $_POST["email"]!=''&& $_POST["tel"]!=''){
    $encrypaw = encryption($_POST["password"]);
		$error_log['success'] =  "Welcome New Friend : ".$_POST["username"]."<br/>";

	}
} 


if(isset($error_log['success']) && !empty($error_log['success'])){
    InsertValue();
    $username = $password = $name= $email = $tel = $education = $experience ='';

}

function InsertValue(){

    global $username, $password,$encrypaw,$conn;

    $sql = "INSERT INTO user (username, password, name, email, tel, education, experience) 
    VALUES ('$_POST[username]','$encrypaw','$_POST[name]','$_POST[email]','$_POST[tel]','$_POST[education]','$_POST[experience]')"; 
    if($conn->query($sql)=== true){
         echo "done";        
    }
    else{
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
    <title>Register</title>
    <link rel="stylesheet" href="../css/user_register.css">

</head>

<body>
    <main class = "container">
		
        <h3>Registration Center</h3>
        <h3><?php echo $error_log['success'];?></h3>

        <form action="<?php echo $_SERVER['PHP_SELF']  ?>" method="post">
            <div class="form-group">
                <label for="username">User code: <span class = "error-msg" >*<span></label>
                <input type="text" class="form-control" id="username" name="username" value="<?php echo $username; ?>">
                <p class = "error-msg"><?php echo $error_log['username']; ?></p>
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
              <textarea class="form-control" id="education" name="education" value="<?php echo $education; ?>" row="10"></textarea>
            </div>

            <div class="form-group">
              <label for="experience">Experience </label>
              <textarea class="form-control" id="experience" name="experience" value="<?php echo $experience; ?>" row="10"></textarea>
            </div>

            <input type="submit" class="send" value="Start">
        </form> 

        <br/>
        <button onclick="window.location.href = 'user_login.php'" class="login">Login</button>

    </main>
</body>
</html>


