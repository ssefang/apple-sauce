<?php

include '../db/database.php';

session_start();
$userid = $_SESSION['userid'];
$username = $_SESSION['username'];

$array_result = CheckApplyHistory();

function CheckApplyHistory(){
    global $conn, $array_result;        
    $sql = "SELECT * FROM application a left join position p on a.posid = p.posid 
            left join company c on p.compid = c.compid where userid = ' $_SESSION[userid]'";    
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        $array_result = $result->fetch_all(MYSQLI_ASSOC); 
    }else{
        echo $conn->connect_error;
    }
    $conn->close();
    return $array_result;
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
    <h3>Application Histroy For User <?php echo $username ;?></h3>

    <!--table for active job -->
        <table class="table table-hover" id="historytable">
            <?php include 'user_historytable.php'; ?>
        </table>

    <button onclick="window.location.href = 'user_dashboard.php'" class="reg">Back To SearchPage</button>
    <button onclick="window.location.href = 'user_edit.php'" class="reg">Update my CV</button>

 </main>
</body>
</html>

<script src="../js/user_dashboard.js"></script>

