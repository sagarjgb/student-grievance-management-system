<?php
$insert = false;
if(isset($_POST['usn'])){
include('connection.php');
//collect post variable
$usn = $_POST['usn'];
$name = $_POST['name'];
$gender = $_POST['gender'];
$age = $_POST['age'];
$year = $_POST['year'];
$dept = $_POST['dept'];
$phno = $_POST['phno'];
$password = $_POST['password'];
$sql = "INSERT INTO `scms`.`student` (`usn`, `name`, `gender`, `age`, `year`, `department`, `phno`, `password`) VALUES ('$usn', '$name', '$gender', '$age', '$year', '$dept', '$phno', '$password');";

 // Execute the query
 if($conn->query($sql) == true){
    // echo "Successfully inserted";

    // Flag for successful insertion
    $insert = true;
}
else{
    echo "ERROR: $sql <br> $conn->error";
}

// Close the database connection
$conn->close();

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap');
        </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Add Student</title>
    <div class="mnu" style="text-align:right">
        <a href="admin.php" style="text-decoration:none; color: white; font-family: 'Open Sans', sans-serif; font-weight:bold; padding: 12px 12px 12px 12px;">Dashboard</a>
        <a href="login.php" style="text-decoration:none; color: white; font-family: 'Open Sans', sans-serif; font-weight:bold; padding: 12px 12px 12px 12px;">Logout</a>
    </div>
</head>
<style>
    .mnu {
        text-align: right;
        font-weight: normal;
      }
    body{
        background-image: url(images_student/bg1.png);
		background-position: right;
		background-color: #00bfa5;
        background-repeat: no-repeat;
        background-size: 100%;
        text-decoration: none;
        font-family: 'Open Sans', sans-serif;
        padding: 10px 10px 10px 10px;
		font-weight: bolder;
    }
    a:hover{
        background-color: rgb(220, 220, 222);
        opacity: 100%;
          border-radius: 7px;
      }
      
    .para{
        text-align:center;
        font-size: 1.2em;
        font-style: normal;
        font-weight: bolder;
        color: rgb(15, 4, 77);
    }
    .iform{
        text-align:left;
        color: rgb(15, 4, 77);
        font-weight: bold;
        padding-left: 43%;
        padding-right: 40%;
        box-shadow: 10px;
        
    }
    input{
        padding: 7px 7px 7px 7px;
        border-radius: 4px;
        background-color: rgb(241, 237, 236);
        border-color: black;
        size: 27;
      }
      input:hover{
        background-color: rgb(220, 220, 222);
      }
      input:active{
          background-color: rgb(175, 170, 170);
      }
      
      select{
        padding: 7px 7px 7px 7px;
        border-radius: 4px;
        background-color: rgb(241, 237, 236);
        border-color: black;
		border-width: 2px;
        size: 27;
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
	  #submit{
		background: rgb(0, 2, 43);
        border: 1px solid rgba(0, 0, 0, 0.1);
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
		  background-color: rgba(9, 3, 63);
	  }
	  #submit:active{
		background-color: rgba(9, 3, 63);
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
      .submitMsg{
        font-style: italic;
            color: rgb(143, 221, 25);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size:smaller;
            font-weight: normal;
    }

	  
</style>
<body>
	<header>
		<img src="images_student/jssate.png" alt="jss logo">
	</header>
    <section class="mn">
        <div class="para">
            <p><strong>Enter details to add student</strong></p>
            <?php
        if($insert == true){
        echo "<p class='submitMsg'>Student added with usn : $usn</p>";
        }
    ?>
        </div>
        <div class="oform">
            <form action="" method="post">
                <div class="iform">
                <div style="padding-top:10px; display:block;">
                    <label for="">USN</label></br>
                <input type="usn" name="usn" placeholder="Enter student usn" autofocus size="27"></br>
                </div>
        
                <div style="padding-top:15px">
                    <label for="">Name</label></br>
                <input type="name" name="name" placeholder="Enter student name" size="27"></br>
                </div>
        
                <div style="padding-top:15px">
                    <label for="">Gender</label></br>
                <!-- <input type="gender" placeholder="Enter student gender" size="27"></br> --> 
                <input type="radio" name="gender" value="male" /> Male
                <input type="radio" name="gender" value="female" />
 				Female
 				<input type="radio" name="gender" value="other" />Other
                </div>
        
                <div style="padding-top:15px">
                    <label for="">Age</label></br>
                <input type="age" name="age" placeholder="Enter student age" size="27"></br>
                </div>

                <div style="padding-top:15px">
                    <label for="">Department</label></br>
                <!-- <input type="dept" placeholder="Enter student department" size="27"></br> -->
                <select name="dept" id="" style="width:230px">
                    <option value="">select department</option>
                    <option value="ai">AI</option>
                    <option value="cse">CSE</option>
                    <option value="civil">CIVIL</option>
                    <option value="ece">ECE</option>
                    <option value="eie">EIE</option>
                    <option value="iem">IEM</option>
                    <option value="ise">ISE</option>
                    <option value="mech">MECH</option>
                    <option value="ra">Robotics</option>
                    <option value="mba">MBA</option>
                </select>
                </div>
        
                <div style="padding-top:15px">
                    <label for="">Year</label></br>
                <!-- <input type="year" placeholder="Enter student current year" size="27"></br> -->
                <select name="year" id="" style="width:230px">
                    <option value="">select year</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
                </div>
        
                
        
                <div style="padding-top:15px">
                    <label for="">Phone number</label></br>
                <input type="phno" name="phno" placeholder="Enter student phone number" size="27"></br>
                </div>
        
                <div style="padding-top:15px">
                    <label for="">Login Password</label></br>
                <input type="password" name="password" placeholder="Enter student password" size="27"></br>
                </div>
            </br>
               <input type="submit" value="submit" id="submit">
            </div>
                
            </form>
        </div>
    </section>
</body>
</html>