<?php
error_reporting(0); 
include '../db/database.php';
include 'encryption.php';

$userid =  $_GET['userid'];

$error_log['password']= $error_log['name'] = $error_log['email'] = $error_log['tel'] = $error_log['success']='';
$password = $name= $email = $tel = $success = $education = $experience = $encrypaw ='';

$response = '';

if(isset($_POST)&&!empty($_POST)){

	if(empty($_POST["password"])){
		$response = 'Need set your password ';
		echo $response;
		exit();
	}else{
		$password = $_POST["password"];
    }

	if(empty($_POST["name"])){
		$response = "Need your full name";
		echo $response;
		exit();
	}else{
		$mail = $_POST["name"];
	}

    if(empty($_POST["email"])){
		$response = "Need enter your email";
		echo $response;
		exit();

	}else{
		$mail = $_POST["email"];
	}

    if(empty($_POST["tel"])){
		$response = "Need Your Phone Number";
		echo $response;
		exit();

	}else{
		$mail = $_POST["tel"];
	}

	if($_POST["password"]!=''&& $_POST["name"]!=''&& $_POST["email"]!=''&& $_POST["tel"]!=''){
		if (UpdateInfo() == true){
			$response = 'success';
		}else {
			$response = 'update failed.';
		}
	}

	echo $response;
	exit();
} 



function UpdateInfo(){
    global $username, $password,$conn,$userid;

	$result = false;

    $encrypaw = encryption($_POST['password']);

    $sql = "update user set password = '$encrypaw', name = '$_POST[name]', email = '$_POST[email]',tel='$_POST[tel]',
    education = '$_POST[education]',experience = '$_POST[experience]' where userid = '$_GET[userid]'";   
    
    
    if($conn->query($sql)=== true){
        $result = true;
    }
    $conn->close();

	return $result;
 }





?>