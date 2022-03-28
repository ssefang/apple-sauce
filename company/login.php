<?php
$nameErr = $passErr = "";
$name = $password  ="";
$_POST['sucess'] = "";
 
      
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        if(empty($_POST['name'])){
           
            $nameErr = 'Please enter your Name';
        }else{
            $name=test_input($_POST["name"]);
            if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
                $nameErr = "Only letters and white space allowed";
            }    
        }
        if(empty($_POST['password'])){
          
            $passErr = 'Please enter your password';
        }else{
            $password=$_POST["password"];
        }
        
    }
// }

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }


if($name!='' && $password!=''){
    InsertValue();
    $name = $password  ="";
}

function InsertValue(){
    $servername = "localhost";
        $username = "root";
        $password = ""; 
        $dbname = "job";
        $conn = new mysqli($servername, $username, $password, $dbname);

 // Store the cipher method
 $ciphering = "AES-128-CTR";
 // Use OpenSSl Encryption method
 $iv_length = openssl_cipher_iv_length($ciphering);
 $options = 0;
// Non-NULL Initialization Vector for encryption
 // Store the encryption key

 $decryption_iv = '1234567891011121';

 // Store the decryption key
 $decryption_key = "GeeksforGeeks";
 // $decryption=openssl_decrypt ($encryption, $ciphering,
 // $decryption_key, $options, $decryption_iv);


     if($conn ->connect_error){
         die("Failed! ". $conn->connect_error);
     }
     // echo $encryption;exit;
     $sql = "select * from company where username = '$_POST[name]'";    
    
     $result = $conn->query($sql);
     if($result->num_rows >0){
         $row = $result->fetch_assoc();
         
         $decryption=openssl_decrypt ($row['password'], $ciphering,
         $decryption_key, $options, $decryption_iv);

         if($_POST['password'] == $decryption){

            session_start();
            $_SESSION['name']=$_POST['name'];
             header("Location: dashboard.php");
             die();
          }
          else{
             global $passErr;
             $passErr = 'Incorrect password try again!';
          }
      }
     else{
         echo "error".$conn->connect_error;
         global $nameErr;
             $nameErr = 'No this username,Please try again!';         
         }
         $conn->close();
         
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact us</title>
  <link rel="stylesheet" href="index.css">
</head>
<body>
    <div class="container">
        <div class="maindiv">
        <div class="col-6">
        <?php echo $_POST['sucess'];?>
            <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
                <label for="name">userName <span class = "error-msg" >*<span></label>
                <input type="text" class ="input-div-nn" id="name" name = "name" value="<?php echo $name;?>">
                <p class = "error-msg"><?php echo $nameErr; ?></p>
            
                <label for="password">password<span class = "error-msg" >*</label>
                <input type="password" class ="input-div-nn" id="password" name="password" value="<?php echo $password;?>" >
                <p class = "error-msg"><?php echo $passErr; ?></p>
                <a href="index.php" class="href">create an account</a>
                
              

                <input type="submit" class="submit" value="Send Message">
            </form>
        </div>
        <div class="col-6"></div>
        </div>
    </div>
</body>
</html>
