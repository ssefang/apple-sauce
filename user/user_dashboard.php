<?php

include '../db/database.php';

session_start();
$username = $_SESSION['username'];
$userid = $_SESSION['userid'];
$error_log['apply']='';


$array_result = CheckPost();

function CheckPost(){
    global $conn;        
    $sql = "select * from position p left join company c on p.compid = c.compid where status = 'active'";    

    $result = $conn->query($sql);
    if($result->num_rows > 0){
        $array_result = $result->fetch_all(MYSQLI_ASSOC); 
        return $array_result;
    }else{
        echo $conn->connect_error;
    }
    $conn->close();
}
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <title>User Dashboard</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/user_dashboard.css">
</head>
<body>
<main class="container">
    <h3>Welcome Back User <?php echo $username ;?></h3>
    <!--rearch bar-->
    <input type="text" name="search" id="search-id-nn" value="">
    <a type="button" value="Show Result" class="submit-search-btn">Search Job</a>
    
    <!--table for active job -->
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
        <table class="table table-hover" id="jobtable">
            <?php include 'user_jobtable.php'; ?>
        </table>
    </form>

    <button onclick="window.location.href = 'user_applyhistroy.php'" class="reg">Check all my application</button>
    <!-- <button onclick="window.location.href = 'user_edit.php/<?php echo $_SESSION['userid'];?>'" class="reg">Update my CV</button> -->
    <button onclick="window.location.href = 'user_edit.php'" class="reg">Update my CV</button>

 </main>
</body>
</html>

<script src="../js/user_dashboard.js"></script>

