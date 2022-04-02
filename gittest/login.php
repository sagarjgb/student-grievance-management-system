<?php
include('connection.php');
$login=false;
if(isset($_POST['username'])){
    $uname=$_POST['username'];
    $password=$_POST["password"];
session_start();
$_SESSION['username']=$_POST['username'];
    if($password=='admin'){
      header('Location: http://' . $_SERVER['HTTP_HOST'] . '/code/gittest/admin.php', true, 303);
      
    }
    
    else{
      $query="select * from student where usn='$uname' and password='$password'";
      $query1="select * from counsellor where counsellor_id='$uname' and password='$password'";
      $result = mysqli_query($conn, $query);
      $result1 = mysqli_query($conn, $query1);
      $count=mysqli_num_rows($result);
      $count1=mysqli_num_rows($result1);
      if($count>0){
        header('Location: http://' . $_SERVER['HTTP_HOST'] . '/code/gittest/student_profile.php', true, 303);
      }
      else if($count1>0){
        header('Location: http://' . $_SERVER['HTTP_HOST'] . '/code/gittest/counsellor_profile.php', true, 303);
      }
      else{
        $login=true;
    }
    }
      
    

}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Page</title>
    <div class="mnu">
      <a
        href="index.php"
        style="text-decoration: none; padding: 12px 12px 12px 12px; color:white;"
        >Home</a
      >
      <a
        href="login.php"
        style="text-decoration: none; padding: 12px 12px 12px 12px; color:white;"
        >Login</a
      >
      <a
        href="mailto:counsellor@jssateb.ac.in"
        style="text-decoration: none; padding: 12px 12px 12px 12px; color:white;"
        >Contact Us</a
      >
    </div>
    <style>
      .mnu {
        text-align: right;
        font-weight: inherit;
        color: rgb(15, 4, 77);
        font-weight: normal;
        padding-right: 10px;
      }
      a:hover {
        background-color: rgb(220, 220, 222);
        opacity: 50%;
        border-radius: 8px;
        width: auto;
        height: auto;
      }
      .srouce {
        text-align: center;
        color: #ffffff;
        padding: 10px;
      }

      *,
      *::before,
      *::after {
        box-sizing: border-box;
        -webkit-box-sizing: border-box;
      }

      body {
        text-decoration: none;
        margin: 0;
        padding: 0;
        color: whitesmoke;
        background-image: url("images_student/bg1.png");
        background-size: cover;
        background-repeat: no-repeat;
        background-position: right;
        background-attachment: fixed;
        padding: 20px;
        overflow-x: hidden;
        background-size: 100%;
        font-family: "Open Sans", sans-serif;
      }

      body,
      input,
      button {
        outline: none;
      }

      .main-container {
        max-width: 900px;
        margin: 0 auto;
      }

      a {
        color: inherit;
        outline: none;
        text-decoration: none;
      }

      a:hover {
        text-decoration: underline;
      }

      .form-container {
        max-width: 450px;
        margin: 0 auto;
      }

      .form-body {
        background-color: rgb(35, 133, 178);
        overflow: hidden;
        padding: 50px;
        color: #ffffff;
        border-radius: 8px;
        -webkit-box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1),
          0 10px 10px -5px rgba(0, 0, 0, 0.04);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1),
          0 10px 10px -5px rgba(0, 0, 0, 0.04);
      }

      @media only screen and (max-width: 500px) {
        .form-body {
          padding: 50px 40px;
        }
      }

      @media only screen and (max-width: 455px) {
        .form-body {
          padding: 45px 30px;
        }
      }

      @media only screen and (max-width: 340px) {
        .form-body {
          padding: 30px 20px;
        }
      }

      .form-body .title {
        margin: 0;
        text-align: center;
        font-weight: normal;
      }

      .the-form {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
      }

      .the-form label {
        margin-bottom: 5px;
        color: white;
        font-weight: bold;
      }

      .the-form [type="username"],
      .the-form [type="password"] {
        padding: 15px;
        font-size: 16px;
        background: rgba(0, 0, 0, 0.2);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 3px;
        margin-bottom: 15px;
        -webkit-transition: background 0.3s;
        transition: background 0.3s;
        color: #f1ecec;
      }

      .the-form [type="username"]::-webkit-input-placeholder,
      .the-form [type="password"]::-webkit-input-placeholder {
        color: rgba(255, 255, 255, 0.3);
      }

      .the-form [type="username"]::-moz-placeholder,
      .the-form [type="password"]::-moz-placeholder {
        color: rgba(255, 255, 255, 0.3);
      }

      .the-form [type="username"]:-ms-input-placeholder,
      .form-container
        .form-body
        .the-form
        [type="password"]:-ms-input-placeholder {
        color: rgba(255, 255, 255, 0.3);
      }

      .the-form [type="username"]::-ms-input-placeholder,
      .form-container
        .form-body
        .the-form
        [type="password"]::-ms-input-placeholder {
        color: rgba(255, 255, 255, 0.3);
      }

      .the-form [type="username"]::placeholder,
      .form-container .form-body .the-form [type="password"]::placeholder {
        color: rgb(255, 255, 255);
      }

      .the-form [type="username"]:hover,
      .the-form [type="password"]:hover {
        background: rgba(0, 0, 0, 0.1);
      }

      .the-form [type="username"]:focus,
      .the-form [type="password"]:focus {
        background: #ffffff;
        -webkit-box-shadow: inset 0 2px 4px 0 rgba(0, 0, 0, 0.06);
        box-shadow: inset 0 2px 4px 0 rgba(0, 0, 0, 0.06);
        border-color: #25dce2;
        color: #000000;
      }

      .the-form [type="username"]:focus::-webkit-input-placeholder,
      .form-container
        .form-body
        .the-form
        [type="password"]:focus::-webkit-input-placeholder {
        color: #666666;
      }

      .the-form [type="username"]:focus::-moz-placeholder,
      .the-form [type="password"]:focus::-moz-placeholder {
        color: #666666;
      }

      .the-form [type="username"]:focus:-ms-input-placeholder,
      .the-form [type="password"]:focus:-ms-input-placeholder {
        color: #666666;
      }

      .the-form [type="username"]:focus::-ms-input-placeholder,
      .the-form [type="password"]:focus::-ms-input-placeholder {
        color: #666666;
      }

      .the-form [type="username"]:focus::placeholder,
      .the-form [type="password"]:focus::placeholder {
        color: #888383;
      }

      .the-form [type="submit"] {
        background: rgb(0, 2, 43);
        border: 1px solid rgba(0, 0, 0, 0.1);
        padding: 18px;
        font-size: 20px;
        border-radius: 3px;
        cursor: pointer;
        margin-top: 20px;
        color: whitesmoke;
        -webkit-box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1),
          0 2px 4px -1px rgba(0, 0, 0, 0.06);
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1),
          0 2px 4px -1px rgba(0, 0, 0, 0.06);
      }

      .the-form [type="submit"]:hover {
        opacity: 0.9;
      }

      .form-footer div {
        text-align: center;
        padding: 25px 20px;
        font-size: 18px;
        color: #e6e6e6;
      }

      .form-footer div a {
        color: #ffb37b;
      }

      .fnt {
        font-family: "Muli", sans-serif, -apple-system, BlinkMacSystemFont,
          "Helvetica Neue", Helvetica, sans-serif;
        padding-left: 0%;
      }
      h1 {
        padding-top: 50px;
        /* font-family: "Muli", sans-serif, -apple-system, BlinkMacSystemFont,
          "Helvetica Neue", Helvetica, sans-serif; */
        font-family: "Open Sans", sans-serif;
        /* color: rgb(15, 4, 77); */
        color: black;
        text-align: center;
        font-weight: normal;
      }
      header{
        display: flex;
        float: left;
        width: 20px;
      }
      .logmsg{
        color: red;
        font-size: small;
        font-weight: bold;
        text-align: center;
        padding-top: 0px;
        margin-top: 0px;
      }
    </style>
  </head>
  <body>
    <header>
      <img
        src="images_student/jssate.png"
        alt="jss logo"
        style="width: 200px"
      />
    </header>
    <h1>Please enter details to login.</h1>
    <div class="main-container">
      <div class="form-container">
        <div class="form-body">
          <form action="" method="post" class="the-form">
          <?php
        if($login == true){
        echo "<p class='logmsg'>username or password incorrect</p>";
        }
    ?>
            <div class="fnt">
              <label for="username">Username</label>
            </div>

            <input
              type="username"
              name="username"
              id="username"
              placeholder="Enter username"
            />
            <div class="fnt">
              <label for="password">Password</label>
            </div>

            <input
              type="password"
              name="password"
              id="password"
              placeholder="Enter password"
            />

            <input type="submit" value="Login" />
          </form>
        </div>
      </div>
    </div>

    <footer>
      <div
        id="contact_us"
        style="
          text-align: right;
          padding-top: 40px;
          padding-bottom: 3%;
          font-weight: lighter;
        "
      >
        <p>
          <a
            href="mailto:counsellor@jssateb.ac.in"
            style="
              text-decoration: none;
              color: white;
              padding: 12px 12px 12px 12px;
            "
            >You can contact us here. . ....</a
          >
        </p>
      </div>
    </footer>
  </body>
</html>
