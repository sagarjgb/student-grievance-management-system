<?php
include('connection.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SGMS Admin</title>

    <style>
      body {
        background-image: url(images_student/bg1.png);
        margin: 5px;
        font-family: "Open Sans", sans-serif;
        background-color: #00bfa5;
      }
      h1 {
        text-align: left;
        padding-left: 20px;
        padding-top: 20px;
        margin: 0px;
        font-size: 3vh;
        font-weight: bold;
        color: rgb(15, 4, 77);
      }
      .rightbox {
        float: right;
        text-decoration: none;
        text-align: middle;
        padding-right: 18px;
        width: 16%;
      }
      .std {
        text-align: justify;
        background-color: rgb(154, 216, 62);
        border-radius: 12px;
      }
      .coun {
        text-align: justify;
        background-color: #ffab00;
        border-radius: 12px;
        background-position: middle;
      }
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
      header{
		  float: left;
		  width: 50px;
	  }
	  img{
		  width: 200px;
		  /* display: flex; */
		 /* padding-left: 645px;  */
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
        
        tr:nth-child(even) {
          background-color: #dddddd;
        }
        tr:nth-child(odd){
          background-color: #ffff;
        }
    </style>
    <div class="mnu">
      <a
        href="index.php"
        style="
          text-decoration: none;
          color: rgb(15, 4, 77);
          padding: 12px 12px 12px 12px;
        "
        >Home</a
      >
      <a
        href="logs.php"
        style="
          text-decoration: none;
          color: rgb(15, 4, 77);
          padding: 12px 12px 12px 12px;
        "
        >Logs</a
      >
      <a
        href="login.php"
        style="
          text-decoration: none;
          color: white;
          padding: 12px 12px 12px 12px;
        "
        >Logout</a
      >
    </div>
    
  </head>
  <body>
  <header>
		<img src="images_student/jssate.png" alt="jss logo">
	</header>
    <section>
      <h1 style="padding-top: 90px; color:#00695c">Welcome Admin !!!!!</h1>
      <div style="float: left;  padding-top: 20px;">
        
        <table>
        <tr>
        <th>Student USN</th>
        <th>Name</th>
        </tr>
        
      <?php
        $query="SELECT usn, name from student";
        $result=$conn-> query($query); 
        if ($result == true) {
            while ($row = $result-> fetch_assoc()) {
                echo "<tr><td>". $row["usn"] . "</td><td>" . $row["name"] . "</td></tr>";
            }
        
        echo "</table>";
    }
        else{
            echo "No details available";
        }
        ?>
        
      </div>
      <div style="float: left; padding-left:10px; padding-top: 20px;">
      <table>
      <tr>
        <th>Counsellor ID</th>
        <th>Name</th>
        </tr>
        <?php
        
        $query1="select counsellor_id, name from counsellor";
        
        $result1=$conn-> query($query1);
        if($result1 == true){
          while($row = $result1-> fetch_assoc()){
           echo "<tr><td>". $row["counsellor_id"] . "</td><td>" . $row["name"] . "</td></tr>";  
          }
        echo "</table>";
    }
        else{
            echo "No details available";
        }
        ?>
      </div>
    </section>
    <section>
      
    </section>
    <section class="rightbox">
      <div class="add-del">
        <div class="std" style="padding: 30px 30px 30px 30px">
          <a
            href="astudent_redirect.php"
            style="
              text-decoration: none;
              color: rgb(15, 4, 77);
              padding: 12px 12px 12px 12px;
            "
            >Add Student</a
          ><br /><br />
          <a
            href="astudentdel_redirect.php"
            style="
              text-decoration: none;
              color: rgb(15, 4, 77);
              padding: 12px 12px 12px 12px;
            "
            >Delete Student</a
          ><br /><br />
        </div>
        <div>
          <br />
        </div>
        <div class="coun" style="padding: 30px 30px 30px 30px">
          <a
            href="acounsellor_redirect.php"
            style="
              text-decoration: none;
              color: rgb(15, 4, 77);
              padding: 12px 12px 12px 12px;
            "
            >Add Counsellor</a
          ><br /><br />
          <a
            href="acounsellordel_redirect.php"
            style="
              text-decoration: none;
              color: rgb(15, 4, 77);
              padding: 12px 12px 12px 12px;
            "
            >Delete Counsellor</a
          ><br /><br />
        </div>
      </div>
    </section>
  </body>
</html>
