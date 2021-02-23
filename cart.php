<?php

session_start();
if (!isset($_SESSION['id'])) {
  header('location:login.php');
}

$user_id = $_SESSION['id'];

require_once 'clasess/User.php';

require_once 'clasess/Product.php';
require_once 'clasess/Bid.php';
// $productId = $_GET['product_id'];

// $product = new Product;
// $productDetails = $product->getOne($productId);

// $lastBid = $product->getTheLastBid($productId);


// $bid = new Bid;
// $bidsInfo = $bid->getAllBidssForProduct($productId);

// $user = new User;

// 
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Project-MaZaD </title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style_cart.css">
  <link rel="stylesheet" href="css/style_mahmoud.css">
  <link rel="stylesheet" href="css/all.min.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto&family=Roboto+Condensed&display=swap" rel="stylesheet">


</head>

<body>


  <!-- <div class="firstelements">

    <img src="images/hero-bg.png" class="bg-img">
  </div> -->
  <section id="product_details_home">

    <nav class="navbar navbar-expand-lg navbar-light mine">
      <div class="container">
        <a class="navbar-brand text-white" href="#"><i class="fas fa-phone-alt mr-2 text-white"></i> Customer
          Support</a>
        <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button> -->

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#"><i class="fas fa-shopping-basket fa-2x text-white"></i></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="profile.php"><i class="fas fa-user-circle fa-2x ml-3 text-white"></i></a>
            </li>
          </ul>
        </div>
      </div>

    </nav>
    <hr>
    <!-- -------------------------------------------end First navbar--------------------------------------------- -->
    <nav class="navbar navbar-expand-lg navbar-light mb-5">
      <div class="container">
        <!-- <a class="navbar-brand" href="#"><img src="images/logo.png" alt="" srcset=""></a>
         -->
        <a class="navbar-brand"><img src="images/user.png" class="w-50"></a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php"><span>Home</span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="index.php"><span>Log out</span></a>
            </li>


          </ul>

        </div>
      </div>
    </nav>


    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="card mt-5">
            <div class="card-header d-flex">
              <i class="fas fa-shopping-cart fa-5x text-warning"></i>
              <div class="mt-3 ml-4">
                <h1>Your Cart <i class="far fa-smile-beam"></i></h1>
              </div>
            </div>

            </h5>

            <div class="card-body">



            </div>
          </div>
        </div>
      </div>
  </section>

  <section>
    </div>





  </section>






  <div>


  </div>

  <script src="js/jquery-3.5.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>

</html>