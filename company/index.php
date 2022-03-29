<?php
$nameErr = $passwordErr = $companyErr = $emailErr = $mobileErr = $addressErr = "";
$name = $password = $company = $email = $mobile = $address ="";
$_POST['sucess'] = "";
    
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        if(empty($_POST['name'])){          
            $nameErr = 'Please enter your User Name';
        }else{
            $name=test_input($_POST["name"]);
            if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
                $nameErr = "Only letters and white space allowed";
            }    
        }
        if(empty($_POST['password'])){          
            $passwordErr = 'Please enter your Password';
        }else{
            $password=test_input($_POST["password"]);
            if (!preg_match("/^[a-zA-Z0-9-' ]*$/",$password)) {
                $passwordErr = "Only letters and noumbers allowed";
            }    
        }
        if(empty($_POST['company'])){          
            $companyErr = 'Please enter your Company Name';
        }else{
            $company=test_input($_POST["company"]);
            if (!preg_match("/^[a-zA-Z-' ]*$/",$company)) {
                $companyErr = "Only letters and white space allowed";
            }    
        }
        if(empty($_POST['email'])){          
            $emailErr = 'Please enter your email';
        }else{
            $email=$_POST["email"];
        }
        if(empty($_POST['mobile'])){          
            $mobileErr = 'Please enter your phone number';
        }else{
            $mobile=test_input($_POST["mobile"]);
            if (!preg_match("/^[0-9]*$/",$mobile)) {
                $mobileErr = "Only number allowed";
            }    
        }
        if(empty($_POST['address'])){           
            $addressErr = 'Please enter your address';
        }else{
            $address=$_POST["address"];
        }
        
}


function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }


if($name!='' && $password!=''&& $company!=''&& $email!=''&&$mobile!='' && $address!=''){
    $_POST['sucess'] = '<p class="success">Register Success</p>';
    InsertValue();
    $name = $password=$company=$email = $mobile = $address ="";
}

function InsertValue(){
    $servername = "localhost";
        $username = "root";
        $password = ""; 
        $dbname = "job";
        $conn = new mysqli($servername, $username, $password, $dbname);

$sql = "SELECT * FROM company where username='$_POST[name]'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  global $nameErr;
  $nameErr="Username has already exist";
  $_POST['sucess'] = '<p class="success">Username has already exist</p>';
  }else {
    $ciphering = "AES-128-CTR";

    // Use OpenSSl Encryption method
    $iv_length = openssl_cipher_iv_length($ciphering);
    $options = 0;
    
    // Non-NULL Initialization Vector for encryption
    $encryption_iv = '1234567891011121';
    
    // Store the encryption key
    $encryption_key = "GeeksforGeeks";
    
    $encryption = openssl_encrypt($_POST['password'], $ciphering,
                $encryption_key, $options, $encryption_iv);
                if($conn ->connect_error){
                    die("Failed! ". $conn->connect_error);
                }
                // echo $encryption;exit;
                $sql = "INSERT INTO `company`(`username`, `password`, `compname`, `compemail`, `comptel`, `compaddr`) VALUES ('$_POST[name]', 
                '$encryption','$_POST[company]','$_POST[email]','$_POST[mobile]','$_POST[address]')";
                   
                if($conn->query($sql)=== true){
                    echo "done";
                    }
                    else{
                    echo "error".$conn->connect_error;   
                    }
                    $conn->close();
        }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
  <link rel="stylesheet" href="index.css">
</head>
<body>
    <div class="container">
        <div class="maindiv">
        <div class="col-6">
        <?php echo $_POST['sucess'];?>
            <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
                <label for="name">User Name <span class = "error-msg" >*<span></label>
                <input type="text" class ="input-div-nn" id="name" name = "name" value="<?php echo $name;?>">
                <p class = "error-msg"><?php echo $nameErr; ?></p>

                <label for="password">Password<span class = "error-msg" >*<span></label>
                <input type="text" class ="input-div-nn" id="password" name = "password" value="<?php echo $password;?>">
                <p class = "error-msg"><?php echo $passwordErr; ?></p>

                <label for="company">Company Name<span class = "error-msg" >*<span></label>
                <input type="text" class ="input-div-nn" id="company" name = "company" value="<?php echo $company;?>">
                <p class = "error-msg"><?php echo $companyErr; ?></p>

                <label for="email">Email<span class = "error-msg" >*</label>
                <input type="email" class ="input-div-nn" id="email" name="email" value="<?php echo $email;?>" >
                <p class = "error-msg"><?php echo $emailErr; ?></p>

                <label for="mobile">Telephone Number<span class = "error-msg" >*</label>
                <input type="text" class ="input-div-nn" id="mobile" name = "mobile" value="<?php echo $mobile;?>">
                <p class = "error-msg"><?php echo $mobileErr; ?></p>

                <label for="address">Company Address<span class = "error-msg" >*<span></label>
                <input type="text" class ="input-div-nn" id="address" name = "address" value="<?php echo $address;?>">
                <p class = "error-msg"><?php echo $addressErr; ?></p>
                <a href="login.php" class="href">Login</a>

                <input type="submit" class="submit" value="Register">
            </form>
        </div>
        <div class="col-6"></div>
        </div>
    </div>
</body>
</html>

