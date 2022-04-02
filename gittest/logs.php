<?php
include('connection.php');

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log display page</title>
    <div class="mnu">
    <a
        href="admin.php"
        style="
          text-decoration: none;
          color: white;
          padding: 12px 12px 12px 12px;
        "
        >Home</a
      >
    </div>
    <style>
             @import url(https://fonts.googleapis.com/css?family=Open+Sans);

        .mnu {
        padding-top: 10px;
        text-align: right;
        padding-right: 20px;
      }
      a:hover {
        background-color: rgba(202, 197, 197, 0.521);
        opacity: 100%;
        border-radius: 7px;
      }
        body{
            background-color: #00bfa5;
            font-family: "Open Sans", sans-serif;
            background-image: url(images_student/bg1.png);
            background-repeat: no-repeat;
            background-size: 100%;
            background-position: auto;
        }
        table{
            border-collapse: collapse;
            width: 100%;
            color: rgb(15, 4, 77);
            font-family: monospace;
            font-size: 15px;
            text-align: left;
        }
        h1{
            text-align: left;
            font-size: 20px;
            font-family: "Open Sans", sans-serif;
            color: rgb(15, 4, 77);
        }
        h2{
            text-align: left;
            font-size: 18px;
            font-family: "Open Sans", sans-serif;
            color: rgb(15, 4, 77);
            font-weight: lighter;
            font-style: italic;
        }
    </style>
</head>
<body>
    <h1>Welcome admin to log page</h1>
    <h2>Student Logs</h2>

    <table style="width: 100%;">
    <tr>
    <th>ID</th>
    <th>USN</th>
    <th>ACTION</th>
    <th>DATE</th>
  </tr>
  <?php
$sql = "select id, usn, action, cdate from `scms`.`student_logs`;";
$result=$conn-> query($sql);

if($result-> num_rows>0){
    while($row = $result-> fetch_assoc()){
        echo "<tr><td>". $row["id"]. "</td><td>". $row["usn"] . "</td><td>" . $row["action"] . "</td><td>" . $row["cdate"] . "</td></tr>";
    }
    echo "</table>";
}
else{
    echo "0 result";
}
  ?>
    </table>
</body>
</html>