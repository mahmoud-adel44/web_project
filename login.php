<?php

session_start();


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/all.min.css">
  <link rel="stylesheet" href="css/style2_menreet.css">
  <link rel="stylesheet" href="css/style_menreet.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  <title>IBid</title>

  <style>
    input:focus {
      outline: none;
    }
  </style>

</head>

<body>

  <div class="bar">
    <a class="bar" href="#"><i class="fas fa-phone-alt mr-2 text-white"></i> Customer
      Support</a>


  </div>


  <div class="sbar">
    <div class="i"><img src="images/logo.png"></div>
    <div class="menu">


      <a class="menu" href="login.php"><span>Login</span></a> &nbsp;
      <a class="menu" href="register.php"><span>Register</span></a>
    </div>

  </div>

  <br>

  <div class="container">
    <table class="T">
      <tr>
        <td class="D1">
          <br>
          <h1 class="A">HI, THERE</h1>
          <P class="B">You can log in to your Sbidu account here.</P>
          <br>

          <div class="with">
            <p class="p-with">

              <i class="fab fa-facebook fa-2x text-primary mt-1"></i>

              <a class="a-with" href=""> Log in with Facebook</a></p>

            <p class="p-with"> <i class="fab fa-google-plus fa-2x text-danger"></i> <a class="a-with" href="">Log in with Google</a></p>
          </div>

          <br>

          <p class="or"></p><span class="or"> Or </span>
          <p class="or"></p>

          <br>

          <form action="handlers/handleLogin.php" method="POST">
            <div class="form"><i class="far fa-envelope"></i><input class="form" type="email" placeholder="Email Adress" name="email">
            </div>

            <br>

            <div class="form"><i class="fas fa-lock"></i><input class="form" type="password" placeholder="Password" name="password">
            </div>
            <br> <br>
            <a class="E">Forgot password?</a>
            <br>

            <div class="log">
              <button class="btn btn-primary" type="submit" name="login-submit"> Submit </button>
            </div>
            <br>
        </td>
        </form>

        <td class="D2">
          <h1 class="Aa">NEW HERE?</h1>
          <P class="Ba">Sign up and create your Account</P>

          <!-- <input class="sign" type="button" value="SIGN UP"> -->
        </td>
      </tr>
    </table>
  </div>

  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
</body>

</html>