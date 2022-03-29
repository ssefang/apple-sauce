<?php
error_reporting(0); 
include '../db/database.php';
include 'encryption.php';

$userid =  $_GET['userid'];

$error_log['password']= $error_log['name'] = $error_log['email'] = $error_log['tel'] = $error_log['success']='';
$password = $name= $email = $tel = $success = $education = $experience = $encrypaw ='';


if(isset($_POST)&&!empty($_POST)){

	if(empty($_POST["password"])){
		$error_log['password'] = "Need set your password";
	}else{
		$password = $_POST["password"];
    }
	if(empty($_POST["name"])){
		$error_log['name'] = "Need your full name";
	}else{
		$mail = $_POST["name"];
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
	if($_POST["password"]!=''&& $_POST["name"]!=''&& $_POST["email"]!=''&& $_POST["tel"]!=''){

		$error_log['success'] =  "Update Done: ".$_POST["username"]."<br/>";

	}
} 


if(isset($error_log['success']) && !empty($error_log['success'])){
    UpdateInfo();

    //error_log是个array，被调用需要serialize 和unserialize
    if(isset($error_log['username']) && !empty($error_log['username'])){
        $errbz = serialize($error_log);
        header("Location: ./../edit.php?id=$userid&err=$errbz");
        
    } else {
        header("Location: ./../dashboard.php");
    }
    
} else {
    $errbz = serialize($error_log);
    header("Location: ./../edit.php?id=$userid&err=$errbz");



}
// UpdateInfo();

function UpdateInfo(){
    global $username, $password,$conn,$userid;

    $encrypaw = encryption($_POST['password']);

    $sql = "update user set password = '$encrypaw', name = '$_POST[name]', email = '$_POST[email]',tel='$_POST[tel]',
    education = '$_POST[education]',experience = '$_POST[experience]' where userid = '$_GET[userid]'";   
    
    echo $sql;
    
    if($conn->query($sql)=== true){
        return true;
    }
    else{
        echo "error".$conn->connect_error;    
        }
         $conn->close();
 }





?>