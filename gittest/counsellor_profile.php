<?php
include('connection.php');
error_reporting(0);
session_start();

         // Execute the query
         if(isset($_POST['pun'])){
          $pg=$_POST['pg'];
        //echo "$pg";
        $query3="select complaint_id from investigation where investigation_id IN (select investigation_id from punishment where punishment_given = '$pg');";
        $result3=$conn-> query($query3);
          if($conn->query($query3) == true){
            //echo "Successfully inserted";
          }
          else{
           // echo "ERROR: $query3 <br> $conn->error";
            echo "ERROR noticed";
          }
        }
        
// $atype=$_SESSION['abuse_type'];
// echo "$atype";
// $sql5="CALL `getPriority`('$atype');";
// $res=mysqli_query($conn,$sql5);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Counsellor Profile</title>
    <div class="mnu">
      <a
        href="index.php"
        style="
          text-decoration: none;
          padding: 12px 12px 12px 12px;
          color: white;
        "
        >Home</a
      >
      <a
        href="acCmpList.php"
        style="
          text-decoration: none;
          padding: 12px 12px 12px 12px;
          color: white;
        "
        >Complaint List</a
      >
      <a
        href="login.php"
        style="
          text-decoration: none;
          padding: 12px 12px 12px 12px;
          /* color: rgb(15, 4, 77); */
          color: white;
        "
        >Logout</a
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
      
      input{
        padding: 7px 7px 7px 7px;
        border-radius: 4px;
        background-color: rgb(241, 237, 236);
      }
      input:hover{
        background-color: rgb(220, 220, 222);
      }
      a:hover {
        background-color: rgb(220, 220, 222);
        opacity: 100%;
        border-radius: 7px;
      }
      body {
        background-image: url(images_student/bg1.png);
        background-size: cover;
        background-repeat: no-repeat;
        margin: 5px;
        font-family: "Open Sans", sans-serif;
        color: rgb(15, 4, 77);
      }
      header{
		  float: left;
		  width: 50px;
	  }
	  img{
		  width: 200px;
		  
	  }
      table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
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
tr:nth-child(odd){
          background-color: #ffff;
        }

a{
  text-decoration: none;
}

    </style>
  </head>
  <body>
  <div style="padding-top:0px; padding-left: 420px">
  <h1 class="blink"><span>Welcome to JSSATEB SGMS Counsellor page</span></h1>
  </div>
        <style>
          .blink{
            font-size: 1.5em;
            position: absolute;
            transform: translate(-50%, -50%);
          }
          span{
            padding-left: 500px;
            text-transform: capitalize; 
            animation:blink 3s linear infinite; color: #00bfa5;
          }
          @keyframes blink{
              0%{opacity: 0;}
              50%{opacity: .5;}
              100%{opacity: 1;}
          }
        </style>
    <main>
    <header>
        <img src="images_student/jssate.png" alt="jss logo">
      </header>
      <section>
        
        <div style="float: left;">
          <h1 style="padding-top: 60px; color:#00bfa5">Hi, <?php echo $_SESSION['username']; ?></h1>
      <section>
     <div style="float: left;">
     <?php
$sql2="SELECT name, gender, age, email, phno from counsellor where counsellor_id='".$_SESSION['username']."'";
$result1 =$conn-> query($sql2);

if($result1==true){
    while($row = $result1-> fetch_assoc()){
      echo "
      <table>
  <tr>
  <th>NAME</th>
  <td>".$row["name"]."</td>
  </tr>
  <tr>
  <th>GENDER</th>
  <td>".$row['gender']."</td>
  </tr>
  <tr>
  <th>AGE</th>
  <td>".$row['age']."</td>
  </tr>
  <th>YEAR</th>
  <td>".$row['email']."</td>
  </tr>
  <th>PHONE NUMBER</th>
  <td>".$row['phno']."</td>
  </tr>
  
</table>";
      }
}
else{
    echo "No data found";
}
  ?>
     
      </section>
     <div style="float: right; width: 5%;  padding-top:0px; display:flex; position:relative; right:650px;">
     <table>
    <tr><th colspan="9" style="text-align: center;">COMPLAINTS ASSIGNED </th></tr>
    <tr>
      <th>INVESTIGATION_ID</th>
    <th>COMPLAINT_ID</th>
    <th>USN</th>
    <th>ABUSER_USN</th>
    <th>ABUSE_TYPE</th>
    <th>STATUS</th>
    <th>PRIORITY</th>
    <th>PUNISHMENT GIVEN</th>
    <th>DELETE</th>
    <!-- <th>Set Priority</th> -->
    <?php
//$sql="SELECT * from `scms`.`investigation` where counsellor_id='".$_SESSION['username']."'";
// $sql="select p* from punishment";
// $sql="select investigation_id, i.complaint_id , usn, abuser_id, abuse_type,status,priority
// from investigation as i JOIN complaint as c on i.complaint_id= c.complaint_id where counsellor_id = '".$_SESSION['username']."'";
$sql="select i.investigation_id, i.complaint_id , usn, abuser_id, abuse_type,
status,priority, punishment_given
from investigation as i left JOIN complaint as c 
on i.complaint_id= c.complaint_id 
left JOIN punishment as p on p.investigation_id = i.investigation_id where counsellor_id = '".$_SESSION['username']."';";
$result=$conn-> query($sql);

if($result == true){
    while($row = $result-> fetch_assoc()){
        echo '<tr>';
        $del=$row['investigation_id'];
        $a_type=$row['abuse_type'];
        echo '<td>'.$row['investigation_id'] .'</td>';
        echo '<td>'.$row['complaint_id'] .'</td>';
        echo '<td>'.$row['usn'] .'</td>';
        echo '<td>'.$row['abuser_id'] .'</td>';
        echo '<td>'.$row['abuse_type'] .'</td>';
        echo '<td>'.$row['status'] .'</td>';
        echo '<td>'.$row['priority'] .'</td>';
        echo '<td>'.$row['punishment_given'] .'</td>';
        echo "<td><a href='delete.php?del=$del'<button type='button' class='btn btn-success'>Delete</button></td>";
        echo '</tr>';
        $atype=$row['abuse_type'];
//echo "$atype";
$sql5="CALL `getPriority`('$atype');";
$res=mysqli_query($conn,$sql5);
// for status update
$ppg = $row['punishment_given'];
$sql777="CALL `getStatus`('$ppg');";
$res777=mysqli_query($conn,$sql777);
$sql111="CALL `rm_red`('$ppg');";
$res111=mysqli_query($conn,$sql111);
        
    }
    echo "</table>";
}
else{
    echo "No complaints assigned.";
}
 ?> 
     </div>
    </main>  
    
    <div class="box">
    <div class="box1">
   <a
        href="punishment.php"
        style="
           background-color: white;
          text-decoration: none;
          color: #00bfa5;
          padding: 12px 12px 12px 12px;
          border-radius: 5px;
        "
        >Click here to take action on Complaints</a>
   </div>
   <!-- style="background-color: none; float: left; -->
          <!-- width: 30%; padding-top:60px; padding-right:200px; padding-left:40px" -->
   
   <div class="box2">
       <form action="" method="post">
         <div>
           <label for="" style="color: #ffff;">Enter Punishment type</label> <br>
          <input type="text" name="pg" placeholder="Enter punishment given" style="border-width:0px; padding:12px 12px 12px 12px;">
          <input type="submit" name="pun" value="Check" style="padding: 10px 15px 10px 15px; background-color:#ffff">
         </div>
         <div>
           <table>

  <?php 
  if($result3 == true){
    echo "<tr>
    <th>Complaint ID</th> 
  </tr>";
    while($row = $result3-> fetch_assoc()){
        echo '<tr>';
        echo '<td>'.$row['complaint_id'] .'</td>';
        echo '</tr>';
        
    }
    echo "</table>";
}
else{
    //echo "No pid available for this punishment type!!";
}
           ?>
         </div>
       </form>
     </div>
    </div>
   
    <!-- style for box class -->
    <style>
      .box{
        /* border: 3px solid black; */
        width: 450px;
        height: 650px;
        position: relative;
       
      }

      .box1{
        /* background-color: greenyellow; */
        position: absolute;
        margin-top: 350px;
        margin-left: 40px;
        
      }
      .box2{
        /* background-color: brown; */
        position: absolute;
        margin-top: 400px;
        margin-left: 40px;
  
}
    </style>
  </body>
</html>