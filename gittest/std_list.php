<?php
include('connection.php');
session_start();
error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List</title>
    <div class="mnu" style="text-align:right">
        <a href="complaint_list.php" style="text-decoration:none; color: white; font-family: 'Open Sans', sans-serif; font-weight:Normal; padding: 12px 12px 12px 12px;">Dashboard</a>
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
        padding-bottom: 30px;
      }
      a:hover{
        background-color: rgb(220, 220, 222);
        opacity: 100%;
          border-radius: 7px;
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

tr:nth-child(even) {
  background-color: #dddddd;
}
tr:nth-child(odd) {
  background-color: white;
}
h1{
    padding-top: 0px;
    margin-top: 0px;
    font-size: 20px;
    font-family: "Open Sans", sans-serif;
}
    </style>
</head>
<body>
    <h1>Student list</h1>
<table>
   <tr>
   <th>USN</th>
   <th>Name</th>
   <th>Gender</th>
   <th>Age</th>
   <th>Year</th>
   <th>Dept.</th>
 </tr>
 <?php
   $query="SELECT usn, name, gender, age, year, department from student";
   $result=$conn-> query($query);
   if($result == true){
       while($row = $result-> fetch_assoc()){
        echo "<tr><td>". $row["usn"] . "</td><td>" . $row["name"] . "</td><td>" . $row["gender"] . "</td><td>" . $row["age"] . "</td><td>" . $row["year"] . "</td><td>" . $row["department"] . "</td></tr>";       }
       echo "</table>";
   }
   else{
       echo "No details available";
   }


   ?>
</body>
</html>