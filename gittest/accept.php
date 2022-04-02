<?php
include('connection.php');
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
    $id = $_GET['id'];
    $query="INSERT INTO `investigation` (`complaint_id`, `counsellor_id`) VALUES ('$id', '".$_SESSION['username']."');";
     
     // Execute the query
 if($conn->query($query) == true){
    header('Location: http://' . $_SERVER['HTTP_HOST'] . '/code/gittest/acCmpList.php', true, 303);
    echo "Complaint Accepted";
    

}
else{
    // echo "ERROR: $query <br> $conn->error";
    echo "There was error in adding your complaint";
}

// Close the database connection
$conn->close();
    ?>
</body>
</html>