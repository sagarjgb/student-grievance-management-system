<?php
include('connection.php');
$register=false;
session_start();
if(isset($_POST['abuser_id'])){
//collect post variable
$uname=$_SESSION["username"];
$_SESSION['abuse_type']=$_POST['abuse_type'];
$abuser_id = $_POST['abuser_id'];
$abuse_type = $_POST['abuse_type'];
$sql = "INSERT INTO `complaint` (`usn`, `abuser_id`, `abuse_type`, `complaint_date`) VALUES ('".$_SESSION['username']."', '$abuser_id', '$abuse_type', CURDATE() );";

 // Execute the query
 if($conn->query($sql) == true){
  //echo "Successfully inserted";

  // Flag for successful insertion
  $register = true;
}
else{
  //echo "ERROR: $sql <br> $conn->error";
  echo "ERROR noticed";
}

}
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Student Profile</title>
    <div class="mnu">
        <a href="index.php" style="text-decoration:none; padding: 12px 12px 12px 12px; color: white;">Home</a>
        <a href="crbystd.php" style="text-decoration:none; padding: 12px 12px 12px 12px; color: white;">Complaint Registered</a>
        <a href="login.php" style="text-decoration:none; padding: 12px 12px 12px 12px; color: white;">Logout</a>
    </div>
    <style>
       @import url(https://fonts.googleapis.com/css?family=Open+Sans);
        .mnu{
            text-decoration: none;
            text-align:right;
            padding-right: 20px;
            padding-top: 20px;
        }
        a:hover{
          background-color: rgb(220, 220, 222);
          opacity: 100%;
          border-radius: 7px;
      }
        body {
            background-image: url(images_student/bg1.png);
            background-color: #00bfa5;
            /* background-position: right; */
            background-size: cover;
            background-repeat: no-repeat;
        margin: 5px;
        font-family: "Open Sans", sans-serif;
        /* background-color: white; */
        color: rgb(15, 4, 77);
      }
        .register-pane{
            float: right;
            padding-top: 8px;
            width: 18%;
        }
        select,input{
        padding: 9px 9px 9px 9px;
        border-radius: 4px;
        background-color: rgb(241, 237, 236);
        border-color: black;
        border-width: 1px;
      }

    
      
      input:hover{
        background-color: rgb(220, 220, 222);
      }
      input:active{
          background-color: rgb(175, 170, 170);
      }
      

      #submit{
		background: #00bfa5;
        border: 1px solid #00bfa5;
        padding: 7px 81px 7px 81px;
        font-size: 20px;
        border-radius: 3px;
        cursor: pointer;
        margin-top: 10px;
        color: whitesmoke;
        -webkit-box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1),
          0 2px 4px -1px rgba(0, 0, 0, 0.06);
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1),
          0 2px 4px -1px rgba(0, 0, 0, 0.06);
	  }
	  #submit:hover{
		  background-color: rgb(226, 45, 45);
	  }
	  #submit:active{
		background-color: rgb(228, 53, 53);
	  }
	  @media screen and (max-width: 600px) {
		  body{
			  padding: 0px;
			  margin: 0px;
			  background-color: white;
			  background-image: none;
			  font-size: smaller;
		  }
		  .mnu{
			  text-align: left;
			  display: flex;
		  }
		  img{
			  width: 50px;
		  }
		  section{
			  float: left;
			  display: inline;
		  }
		  input{
			  size: 15;
		  }
		  form{
			  text-align: left;
		  }
		  
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
    form{
      background-color: white;
      padding: 20px 20px 20px 20px;
      border-radius: 3px;
      color: #00bfa5;
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
 .submitMsg{
   padding-top: 0px;
        font-style: italic;
            color: #33691e;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size:smaller;
            font-weight: normal;
    }
    </style>
    <script>
      function registerclk() {
        alert("Are you sure to register complaint");
      }
    </script>
  </head>
  <body>
  <div style="padding-top:0px; padding-left: 420px">
  <h1 class="blink"><span>Welcome to JSSATEB SGMS Student page</span></h1>
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

  <?php
$sql2="SELECT name, gender, age, year, department, phno from student where usn='".$_SESSION['username']."'";
$result1 =$conn-> query($sql2);

if($result1-> num_rows>0){
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
  <td>".$row['year']."</td>
  </tr>
  <th>DEPARTMENT</th>
  <td>".$row['department']."</td>
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
    
        </div>
      </section>
        <div style="margin-top: 200px; float: left; margin-left:350px;">
          <a href="complaint_list.php" style="padding: 12px 12px 12px 12px; background-color:#ff1744; color: white; border-radius:7px">Complaint List</a>
        </div>
      <section>
        <div class="register-pane">
            <div>
                <p style="font-size: 0.9em; padding: 4px; padding-bottom: 5px; border-radius: 3px; background-color: white; color: #00bfa5; border-radius: 3px;">REGISTER YOUR COMPLAINT HERE</p>
            </div>
            <div>
                <form action="" method="post">
                <?php
        if($register == true){
        echo "<p class='submitMsg'>complaint registered, Thank you.</p>";
        }
    ?>
                    <div class="iform">
                    
                    <div style="padding-top:4px">
                        <label for="">Abuser USN</label></br>
                    <input type="abuser_usn" name="abuser_id" placeholder="Enter abuser usn" required size="27"></br>
                    </div>
            <br>
                    <div style="padding-top:5px">
                        <label for="">Abuse Type</label></br>
                    <!-- <input type="abuse_type" placeholder="Enter abuse type" size="27"></br> -->
                    <select name="abuse_type" id="" style="padding-right: 95px;">
                      <option value="">select type..</option>
                      <option value="drug abuse">Drug abuse</option>
                      <option value="discrimination">Discrimination</option>
                      <option value="emotional abuse">Emotional abuse</option>
                      <option value="financial abuse">Financial abuse</option>
                      <option value="harassment">Harassment</option>
                      <option value="mental abuse">Mental abuse</option>
                      <option value="physical abuse">Physical abuse</option>
                      <option value="ragging">Ragging</option>
                      <option value="sexual abuse">Sexual abuse</option>
                      <option value="other">Other</option>
                    </select>
                    </div>
            <br>
                   <input type="submit" value="Register" id="submit" onclick="registerclk()">
                </div>
                    
                </form>
            </div>
        </div>
      </section>
    </main>
  </body>
</html>