<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>JSSATE SGMS</title>
    <div class="mnu">
      <a href="index.php" style="text-decoration: none; color:white">Home</a>
      <a href="login.php" style="text-decoration: none; color:white">Login</a>
      <a href="mailto:counsellor@jssateb.ac.in" style="text-decoration: none; color:white"
        >Contact Us</a
      >
    </div>
    <style>
      
      body {
        background-image: url(images_student/bg1.png);
        background-color: #25b88f;
        background-repeat: no-repeat;
        background-position: left;
        /* color: white; */
        background-size: cover;
      }
      * {
        text-decoration: none;
        padding-top: 6px;
        padding-bottom: 8px;
        padding-left: 8px;
        padding-right: 8px;
        color: rgb(15, 4, 77);
        /* color: white; */
        font-family: "Open Sans", sans-serif;
      }
      .mnu {
        text-align: right;
        font-weight: inherit;
        color: #00bfa5;
      }

      .lgn {
        float: center;
        text-align: center;
        text-decoration: none;
        /* font-family: "Roboto", sans-serif; */
        font-size: 28px;
        /* font-weight: bold; */
       
        background: rgb(220, 220, 222);
       
        width: 260px;
        padding: 8px;
        text-align: center;
        border-radius: 10px;
        display: flex;
        height: auto;
      }
      
      a:hover {
        /* background-color: rgb(220, 220, 222); */
        background: #d9d6d5 ;
        opacity: 100%;
        border-radius: 7px;
      }

      h1 {
        padding-left: 70px;
        text-align: center;
        font-weight: normal;
        font-size: 33px;
        /* color: #78100d; */
        color: black;
      }
      dt {
        text-align: left;
        font-weight: normal;
        font-size: 15px;
      }
      header {
        float: left;
        width: 50px;
        display: flex;
      }
      #tickets {
        /* background-color: rgb(5, 0, 71); */
        /* background-color: #00796b; */
        float: left;
        border-radius: 5px;
        font-family: monospace;
      }
      button {
        padding: 14px 14px 14px 14px;
        background: white;
        -webkit-box-shadow: inset 0 2px 4px 0 rgba(0, 0, 0, 0.06);
        box-shadow: inset 0 2px 4px 0 rgba(0, 0, 0, 0.06);
        border-color: white;
        color: #00bfa5;
        font-size: large;
        border-radius: 4px;
      }
      button:hover {
        background-color: rgb(0, 0, 0, 0.5);
      }
    </style>
    <script>
      function ragging() {
        alert("you will be redirected to ragging news article page");
        window.location = "https://timesofindia.indiatimes.com/topic/ragging";
      }
      function drug_abuse() {
        alert("you will be redirected to Drug abuse news article page");
        window.location = "https://timesofindia.indiatimes.com/topic/drugabuse";
      }
      function discrimination() {
        alert("you will be redirected to Discrimination news article page");
        window.location =
          "https://timesofindia.indiatimes.com/topic/discrimination";
      }
      function harassment() {
        alert("you will be redirected to harassment news article page");
        window.location =
          "https://timesofindia.indiatimes.com/topic/harassment";
      }
    </script>
  </head>
  <body>
    <header>
      <img
        src="images_student/jssate.png"
        alt="jss logo"
        style="width: 190px"
      />
    </header>
    <main>
      <section>
        <div>
          <h1>Welcome to JSSATE Student Grievance Management System [SGMS]</h1>
        </div>
        <div>
          <dl>
            <dt style="font-size: large; color: black;">Hello students ,</dt>
            <dd>
              <p style="font-size: large; text-align:center; color: white;">
                "
                JSSATEB Student Grievance Management System (SGMS)
                is a computerized solution to avoid the various type of abuse
                faced by student in college. SGMS helps students to register
                complaint online and mentored by the counsellor regarding the
                various problem faced by the student as soon as possible. Here
                counsellor takes required action against the complaint
                registered. "
              </p>
            </dd>
          </dl>
        </div>
      </section>
      <section class="olgn">
        <div class="lgn">
          <a href="login.php" style="color: #00bfa5;">click here to login.</a>
        </div>
      </section>
    </main>
    <footer>
      <div id="tickets">
        <p style="color: #ffffff; font-size:large">News articles</p>
        <button onclick="ragging()">Ragging</button>
        <button onclick="drug_abuse()">Drug abuse</button>
        <button onclick="harassment()">Harassment</button>
        <button onclick="discrimination()">Discrimination</button>
      </div>
      <div
        id="contact_us"
        style="
          text-align: right;
          padding-top: 50px;
          padding-bottom: 0%;
          font-weight: lighter;
        "
      >
        <p>
          <a
            href="mailto:counsellor@jssateb.ac.in"
            style="
              text-decoration: none;
              color: rgb(5, 34, 15);
              font-weight: bolder;
              color: #ffffff;
            "
            >You can contact us here. . ....</a
          >
        </p>
      </div>
    </footer>
  </body>
</html>
