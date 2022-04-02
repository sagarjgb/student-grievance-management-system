<?php
include('connection.php');
error_reporting(0);
session_start();
$insert = false;
?>



<html>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Take Action</title>
    </head>
 <?php
    if(isset($_POST['investigation_id'])){
        //collect post variable
        $uname=$_SESSION["username"];
        $invid = $_POST['investigation_id'];
        $pungiven = $_POST['punishment_type'];
          $sql6="INSERT INTO `punishment` (`investigation_id`, `punishment_given`) VALUES ('$invid', '$pungiven');";
          $result6=$conn-> query($sql6);
          if($conn->query($sql6) == true){
            //echo "Successfully inserted";
            $insert = true;
           // $close->conn();
          }
          else{
           //echo "ERROR: $query3 <br> $conn->error";
            echo "ERROR noticed";
          }
          
        
    }

 ?>   
    <style>
        @import url(https://fonts.googleapis.com/css?family=Open+Sans);
        .mnu {
        text-decoration: none;
        text-align: right;
        padding-right: 20px;
        padding-top: 7px;
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
      img{
		  width: 200px;
		  
	  }
      body{
        background-image: url(image_student/bg1.png);
        font-family: "Open Sans", sans-serif;
        background-color: #26a69a;
      }
     
      .fnt{
          padding-bottom: 10px;
      }
      #submit{
		background: rgb(243, 4, 4);
        border: 1px solid rgba(110, 3, 3, 0.1);
        padding: 7px 130px 7px 130px;
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

      .main-container{
        float: right;
          position: relative;
          right: 620px;
          top: 100px;
          padding: 20px 20px 20px 20px;
          border-radius: 7px;
          background-color: #00b8d4;
      }
      input{
          border-width: 0px;
          border: none;
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
  color: #b71c1c;
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
        .submitMsg{
        font-style: italic;
            color: white;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 14px;
            font-weight: bold;
    }   

a{
  text-decoration: none;
}
      </style>
    <body style="background-image: url(image_student/bg1.png);">
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
    
    <header>
      <img
        src="images_student/jssate.png"
        alt="jss logo"
        style="width: 200px"
      />
    </header>
   
    <div style="padding-top:0px; padding-left: 450px">
  <h1 class="blink"><span>Please enter Investigation id and punishment type.</span></h1>
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
            animation:blink 2s linear infinite; color: white;
          }
          @keyframes blink{
              0%{opacity: 0;}
              50%{opacity: .5;}
              100%{opacity: 1;}
          }
        </style>

    <div class="main-container">
      <div class="form-container">
        <div class="form-body">
        <?php
        if($insert == true){
        echo "<p class='submitMsg'>Punishment data pushed to database successfully.</p>";
        }
    ?>
          <form action="" method="post" class="the-form">
        
            <div class="fnt">
              <label for="investigation_id">Investigation ID</label>
            </div>

            <input
              type="investigation_id"
              name="investigation_id"
              id="investigation_id"
              placeholder="Enter Investigation_id"
              size="37" required
              style="padding: 10px 30px 10px 10px;"
            /> 
            <div class="fnt" style="padding-top: 15px;">
              <label for="punishment_type">Punishment Type</label>
            </div>

            <input
              type="punishment_type"
              name="punishment_type"
              id="punishment_type"
              placeholder="Enter punishment_type"
              size="37" required
              style="padding: 10px 30px 10px 10px;"
            />
            <div>
                <br>
                <input type="submit" value="Submit" id="submit">
            </div>
            
          </form>
        </div>
      </div>
    </div>

    
    </body>
</html>