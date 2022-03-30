<?php

error_reporting(0);

$jobtitleErr = $requirmentErr = $salaryErr =  "";
$jobtitle = $requirment = $salary ="";
$_POST['sucess'] = "";
    
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        if(empty($_POST['jobtitle'])){          
            $jobtitleErr = 'Please enter your jobtitle';
        }else{
            $jobtitle=test_input($_POST["jobtitle"]);
            if (!preg_match("/^[a-zA-Z-' ]*$/",$jobtitle)) {
                $jobtitleErr = "Only letters and white space allowed";
            }    
        }
        if(empty($_POST['requirment'])){          
            $requirmentErr = 'Please enter your requirment';
        }else{
            $requirment=test_input($_POST["requirment"]);
            if (!preg_match("/^[a-zA-Z-0-9' ]*$/",$requirment)) {
                $requirmentErr = "Only letters and white space allowed";
            }    
        }
        if(empty($_POST['salary'])){          
            $salaryErr = 'Please enter your salary';
        }else{
            $salary=test_input($_POST["salary"]);
            if (!preg_match("/^[a-zA-Z-0-9' ]*$/",$salary)) {
                $salaryErr = "Only letters and numbers allowed";
            }    
        }
 
        
}


function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }


if($jobtitle!='' && $requirment!=''&& $salary!=''){
    $_POST['sucess'] = '<p class="success">Post Success</p>';
    InsertValue();
    $jobtitle = $requirment=$salary= "";
}

function InsertValue(){
    $servername = "localhost";
        $username = "root";
        $password = ""; 
        $dbname = "job";
        $conn = new mysqli($servername, $username, $password, $dbname);

                $sql = "INSERT INTO `position`(`compid`, `jobtitle`, `requirment`, `salary`, `status`) VALUES ('$_POST[compid]', 
                '$_POST[jobtitle]','$_POST[requirment]','$_POST[salary]','$_POST[status]')";
                
          
                if($conn->query($sql)=== true){
                    echo "done";
                    }
                    else{
                    echo "error".$conn->connect_error;   
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
    <title>new position</title>
  <link rel="stylesheet" href="index.css">
</head>
<body>
    <div class="container">
        <div class="maindiv">
        <div class="col-6">
        <?php echo $_POST['sucess'];?>
            <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
                <label hidden for="compid">compid<span class = "error-msg" ><span></label>
                <input type="hidden" class ="input-div-nn" id="compid" name = "compid" value="<?php echo $_GET['compid'];?>">


                <label for="jobtitle">jobtitle<span class = "error-msg" >*<span></label>
                <input type="text" class ="input-div-nn" id="jobtitle" name = "jobtitle" value="<?php echo $jobtitle;?>">
                <p class = "error-msg"><?php echo $jobtitleErr; ?></p>

                <label for="requirment">requirment<span class = "error-msg" >*<span></label>
                <input type="text" class ="input-div-nn" id="requirment" name = "requirment" value="<?php echo $requirment;?>">
                <p class = "error-msg"><?php echo $requirmentErr; ?></p>

                <label for="salary">salary<span class = "error-msg" >*<span></label>
                <input type="text" class ="input-div-nn" id="salary" name = "salary" value="<?php echo $salary;?>">
                <p class = "error-msg"><?php echo $salaryErr; ?></p>

                <label for="status">status<span class = "error-msg" >*</label>
                <!-- <input type="status" class ="input-div-nn" id="status" name="status" value="<?php echo $status;?>" >
                <p class = "error-msg"><?php echo $statusErr; ?></p> -->
                <select class ="input-div-nn" name="status" id="status">
                    <option value= "active" selected >active</option>
                    <option value= "freeze">freeze</option>
                </select>
                <p class = "error-msg"><?php echo $statusErr; ?></p>

                <input type="submit" class="submit" value="Post">
            </form>
        </div>
        <div class="col-6"></div>
        </div>
    </div>
</body>
</html>

