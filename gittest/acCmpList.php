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
    <title>Complaint List</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <div class="mnu">
    <a
        href="counsellor_profile.php"
        style="
          text-decoration: none;
          padding: 12px 12px 12px 12px;
          color: white;
        "
        >Dashboard</a
      >
    </div>
    <style>
       @import url(https://fonts.googleapis.com/css?family=Open+Sans);
        .mnu {
        text-decoration: none;
        text-align: right;
        padding-right: 20px;
        padding-top: 20px;
      }
      
      body{
        background-image: url(images_student/bg1.png);
        font-family: "Open Sans", sans-serif;
      }
      a:hover {
        background-color: rgb(220, 220, 222);
        opacity: 100%;
        border-radius: 7px;
      }
      a{
          text-decoration: none;
      }
      table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 60%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

th{
  color: #00bfa5;
}

td{
  color: black;
}

tr:nth-child(even) {
  background-color: #e0e0e0;
}
tr:nth-child(odd) {
  background-color: white;
}
    </style>
</head>
<body>
    <div style="padding-left:400px">
    <table>
    <tr><th colspan="6" style="text-align: center;">COMPLAINT DETAILS</th></tr>
    <tr>
    <th>COMPLAINT_ID</th>
    <th>USN</th>
    <th>Abuser_USN</th>
    <th>Abuse_Type</th>
    <th>COMPLAINT_DATE</th>
    <th>ACCEPT</th>
    <?php
$sql="SELECT complaint_id ,usn, abuser_id, abuse_type, complaint_date from `scms`.`complaint`";
$result=$conn-> query($sql);

if($result == true){
    while($row = $result-> fetch_assoc()){
        $id=$row['complaint_id'];
        echo '<tr>';
        echo '<td>'.$row['complaint_id'] .'</td>';
        echo '<td>'.$row['usn'] .'</td>';
        echo '<td>'.$row['abuser_id'] .'</td>';
        echo '<td>'.$row['abuse_type'] .'</td>';
        echo '<td>'.$row['complaint_date'] .'</td>';
        echo "<td><a href='accept.php?id=$id'<button type='button' class='btn btn-success'>Accept</button></td>";

        echo '</tr>';
        
    }
    echo "</table>";
}
else{
    echo "0 result";
}
 ?> 
    </div>   
</body>
</html>