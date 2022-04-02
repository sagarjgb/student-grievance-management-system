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
    <title>student complaint list</title>
    <div class="mnu" style="text-align:right">
        <a href="student_profile.php" style="text-decoration:none; color: white; font-family: 'Open Sans', sans-serif; font-weight:Normal; padding: 12px 12px 12px 12px;">Dashboard</a>
        <a href="std_list.php" style="text-decoration: none; color: white; font-family: 'Open Sans', sans-serif; font-weight:Normal; padding: 12px 12px 12px 12px;">Student List</a>
       
        <a href="login.php" style="text-decoration:none; color: white; font-family: 'Open Sans', sans-serif; font-weight:Normal; padding: 12px 12px 12px 12px;">Logout</a>

    </div>
    <style>
            @import url(https://fonts.googleapis.com/css?family=Open+Sans);
            body{
              background-image: url(images_student/bg1.png);
              background-size: cover;
              background-repeat: no-repeat;
              padding-left: 400px;
            }
         .mnu {
             padding-top: 13px;
        text-align: right;
        font-weight: normal;
      }
      a:hover{
        background-color: rgb(220, 220, 222);
        opacity: 100%;
          border-radius: 7px;
      }
      table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 80%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}
th{
  color: #00bfa5;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
tr:nth-child(odd) {
  background-color: white;
}
.stdlst{
    display: flex;
    text-decoration: none;
    float: right;
    margin-right: 40px;
    font-size: large;
    padding-top: 0px;
    margin-top: 0px;
    
}
h1{
    padding-top: 0px;
    margin-top: 0px;
    font-size: 20px;
    font-family: "Open Sans", sans-serif;
}
a{
  text-decoration: none;
}
    </style>
</head>
<body>
   
   <main>
   <table>
   <tr>
   <th>Complaint ID</th>
   <th>Abuser USN</th>
   <th>Abuse Type</th>
   <th>Complaint Date</th>
   <th>Status</th>
   <th>Counsellor Assigned</th>
   <th>Withdraw</th>
 </tr>
 
 <?php
 echo "<h1>Complaints registered by '".$_SESSION['username']."' and assigned to counsellor.</h1>";
   $query="SELECT complaint.*, investigation.* FROM `complaint`, `investigation` WHERE usn='".$_SESSION['username']."' and complaint.complaint_id=investigation.complaint_id";
   $result=$conn-> query($query);
   if($result == true){
       while($row = $result-> fetch_assoc()){
        $delc=$row['complaint_id'];
        echo "<tr><td>". $row["complaint_id"] . "</td><td>" .$row["abuser_id"] . "</td><td>" . $row["abuse_type"] . "</td><td>" .$row["complaint_date"] . "</td><td>" .$row["status"] . "</td><td>" . $row["counsellor_id"] . "<td><a href='scdelete.php?delc=$delc'<button type='button' class='btn btn-success'>withdraw</button></td>". "</td></tr>";       }
       echo "</table>";
   }
   else{
       echo "No complaints registered by you";
   }


   ?>
   </table>
   
   </main>

</body>
</html>