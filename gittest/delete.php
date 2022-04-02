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
    $del=$_GET['del'];
    // $delc=$_GET['delc'];
    // $query0="delete from complaint where complaint_id='$delc';";
    // if($conn->query($query0) == true){
    //     //header('Location: http://' . $_SERVER['HTTP_HOST'] . '/code/gittest/complaint_list.php', true, 303);
    //     //echo "Complaint Deleted";
        
    
    // }
    // else{
    //     //echo "ERROR: $query <br> $conn->error";
    //     echo "There was error in withdrawal of your complaint. Contact respective counsellor";
    // }
    $query="DELETE from investigation WHERE investigation_id='$del';";
     // Execute the query
 if($conn->query($query) == true){
    header('Location: http://' . $_SERVER['HTTP_HOST'] . '/code/gittest/counsellor_profile.php', true, 303);
    echo "Complaint Deleted";
    

}
else{
    //echo "ERROR: $query <br> $conn->error";
    echo "There was error in adding your complaint";
}

// Close the database connection
$conn->close();
    ?>
</body>
</html>