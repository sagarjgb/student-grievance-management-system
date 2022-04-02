<?php
include('connection.php');
error_reporting(0);
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>accept cmplaint by counsellor</title>
</head>
<body>
    <?php
    
    $delc=$_GET['delc'];
    $query0="delete from complaint where complaint_id='$delc';";
    if($conn->query($query0) == true){
        header('Location: http://' . $_SERVER['HTTP_HOST'] . '/code/gittest/crbystd.php', true, 303);
        //echo "Complaint Deleted";
        
    
    }
    else{
        //echo "ERROR: $query <br> $conn->error";
        echo "There was error in withdrawal of your complaint. Contact respective counsellor";
    }

// Close the database connection
$conn->close();
    ?>
</body>
</html>