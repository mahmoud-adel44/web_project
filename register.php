<?php
session_start();


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="css/all.min.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style_viola.css">

  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  <title>IBid</title>

  <style>
    body {
      overflow: hidden;
    }

    .register .l-side {
      border-radius: 0;
      padding: 60px 20px;

      font-weight: 100;
    }

    .register .l-side h1 {
      font-weight: 300;
    }



    .register .r-side {
      border-radius: 0;
      padding: 40px 20px;

      position: relative;

    }

    .register .r-side h1 {
      font-size: 1rem;
    }

    .register .r-side .mohamed {
      position: absolute;

      top: 50%;
      left: 0;
      right: 0;
      transform: translate(0%, -50%);
    }
  </style>
</head>

<body>

  <section id="home" class="mb-5">
    <nav class="navbar navbar-expand-lg navbar-light mine">
      <div class="container">
        <a class="navbar-brand text-white" href="#"><i class="fas fa-phone-alt mr-2 text-white"></i> Customer
          Support</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">

        </button>


      </div>

    </nav>
    <hr>
    <nav class="navbar navbar-expand-lg navbar-light ">
      <div class="container">
        <a class="navbar-brand" href="#"><img src="images/logo.png" alt="" srcset=""></a>


        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">

            <li class="nav-item ">
              <a class="nav-link" href="login.php"><span>Login</span></a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="register.php"><span>Register</span></a>
            </li>
          </ul>

        </div>
      </div>
    </nav>


    <div class="container text-center">
      <div class="row no-gutters register">
        <div class="col-12 col-sm-6 col-md-8 bg-light l-side">
          <h1><strong>SIGN UP</strong></h1>
          <p><small>We 're happy you're here!</small></p>

          <form class="row" action="handlers/handleRegister.php" method="POST">
            <div class="col-md-6">

              <label class="form-label">Your Full Name</label>
              <input type="text" id="customername" class="form-control" name="name" required>

              <!-- ------------------- -->
              <label>Email address</label>
              <input type="email" class="form-control " name="email" aria-describedby="emailHelp" placeholder="">
              <!-- ------------------------ -->
              <label>Password</label>
              <input type="password" class="form-control" name="password">
            </div>
            <!-- ------------------------ -->
            <!-- ------------------------ -->
            <div class="col-md-6">
              <label class="form-label">Adress</label>
              <input type="text" class="form-control" id="city" name="address">
              <!-- ------------------------ -->
              <label class="form-label">Phone Number</label>
              <input type="number" class="form-control" id="phone" placeholder="" required name="phone">
              <!-- ------------------------ -->
              <label class="form-label">Data Of Birth:</label>
              <input type="date" class="form-control" id="appt" required name="date_birth">
              <br>
            </div>
            <div class="col-12  mt-3">
              <button class="btn mybtn" type="submit" name="submit">LOG IN</button>
            </div>
          </form>
        </div>
        <div class="col-6 col-md-4 r-side">
          <div class="mohamed">
            <h1>ALREADY HAVE AN ACCOUNT?</h1>
            <p>Log in and go to your Dashboard.</p>
            <div class="col-12 mt-3">
              <!-- <button class="btn mybtn " type="submit"><a href="..">LOG IN</a></button> -->
            </div>
          </div>
        </div>
      </div>


  </section>

  <script src="js/jquery-3.2.1.slim.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
</body>

</html>