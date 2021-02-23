<?php
session_start();
require_once 'clasess/User.php';

require_once 'clasess/Product.php';
if (!isset($_SESSION['id'])) {
  header('location:login.php');
}
$user_id = $_SESSION['id'];

// $user = new User;
// $userInfo = $user->getInfo($user_id);

$prodctsData = new Product;

$productsForcategorieOne =  $prodctsData->getThreeProductsForFirstCategory();
$productsForcategorieTow =  $prodctsData->getSecondProductsForFirstCategory();
$productsForcategorieThree =  $prodctsData->getThirdProductsForFirstCategory();


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/all.min.css">
  <link rel="stylesheet" href="css/style_mahmoud.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  <title>IBid</title>
</head>

<body>

  <section id="home" class="mb-5">
    <nav class="navbar navbar-expand-lg navbar-light mine">
      <div class="container">
        <a class="navbar-brand text-white" href="#"><i class="fas fa-phone-alt mr-2 text-white"></i> Customer
          Support</a>


        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="cart.php"><i class="fas fa-shopping-basket fa-2x text-white"></i></a>
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
    <nav class="navbar navbar-expand-lg navbar-light ">
      <div class="container">
        <!-- <a class="navbar-brand" href="#"><img src="images/logo.png" alt="" srcset=""></a>
         -->
        <a class="navbar-brand" href="profile.php"><img src="images/user.png" class="w-50"></a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php"><span>Home</span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="handlers/handleLogout.php"><span>Log out</span></a>
            </li>

          </ul>

        </div>
      </div>
    </nav>

    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6 col-sm-12">
          <div class="asside-left">
            <h4 style="color: #00f7ff;">Next Generation Auction</h4>
            <h1 class="title t1"><span class="d-xl-block">Find Your</span> Next Deal!</h1>
            <p class="text-white">
              Online Auction is where everyone goes to shop, sell,and give, while discovering variety and affordability.
            </p>
            <a href="#0" class="btn btn-warning btn-large rounded-pill"><span style="font-size: x-large; color: black;">Get Started</span></a>
          </div>
        </div>
        <div class="col-md-6 col-sm-0">
          <img src="images/banner-1.png" class="w-100">
        </div>
      </div>
    </div>

    <div class="cats_header">
      <div class="container">
        <div class="row">


          <div class="col-md-2">

            <div class="card shadow" style="width: 150px; height: 150px;">
              <div class="card-body">
                <img src="images/01.png" class="w-100">
                <p class="cat_name">Cars</p>

              </div>

            </div>
          </div>

          <div class="col-md-2">

            <div class="card shadow" style="width: 150px; height: 150px;">
              <div class="card-body">
                <img src="images/02.png" class="w-100">
                <p class="cat_name">Jewelry</p>

              </div>

            </div>
          </div>

          <div class="col-md-2">

            <div class="card shadow" style="width: 150px; height: 150px;">
              <div class="card-body">
                <img src="images/03.png" class="w-90 ml-4">
                <p class="cat_name">Watches</p>

              </div>

            </div>
          </div>

          <div class="col-md-2">

            <div class="card shadow" style="width: 150px; height: 150px;">
              <div class="card-body">
                <img src="images/04.png" class="w-90 ml-2">
                <p class="cat_name">Electronic</p>

              </div>

            </div>
          </div>
          <div class="col-md-2">

            <div class="card shadow" style="width: 150px; height: 150px;">
              <div class="card-body">
                <img src="images/05.png" class="w-90 ml-2">
                <p class="cat_name">Sports</p>

              </div>

            </div>
          </div>
          <div class="col-md-2">

            <div class="card shadow" style="width: 150px; height: 150px;">
              <div class="card-body">
                <img src="images/06.png" class="w-90 ml-2">
                <p class="cat_name">Real Estate</p>

              </div>

            </div>
          </div>


        </div>
      </div>
    </div>


  </section>




  <br>
  <br>
  <div class="container">

    <div class="d-flex  mb-3">

      <div class="p-2 "><img src="images/01.png" class="w-100"></div>
      <div class="p-2 mt-2">
        <h1 class="name_cats">Vehicles</h1>
      </div>

      <div class="ml-auto p-2">
        <a href="list.php?cat_id=1" class="btn btn-light btn-lg rounded-pill border-dark"> View ALL</a>
      </div>
    </div>
  </div>

  <section id="Vehicles" class="mt-5">
    <div class="container">
      <div class="row">
        <?php foreach ($productsForcategorieOne as $catOne) { ?>


          <div class="col-md-4">
            <div class="card" style="width: 18rem;">
              <img src="images/<?php echo $catOne['img'] ?>" class="card-img-top w-80 p-2" style="height: 300px;">
              <div class="card-body">
                <h5 class="card-title"><?php echo $catOne['name'] ?></h5>
                <span>.......................................................</span>
                <div class="row ">
                  <div class="col-md-6 border-right">
                    <div class="row ">
                      <div class="col-md-3">
                        <i class="fas fa-gavel  icon_bid fa-rotate-270"></i>
                      </div>
                      <div class="col-md-9">
                        <p class="current_bid cur1">Current Bid</p>

                        <div class="amount">$<?php
                                              $lastBid = $prodctsData->getTheLastBid($catOne['id']);

                                              echo $lastBid['MAX(price)'];
                                              ?></div>
                      </div>
                    </div>
                  </div>


                  <div class="col-md-6">
                    <div class="row ">
                      <div class="col-md-3">

                        <i class="fas fa-money-bill-wave  icon_money"></i>
                      </div>
                      <div class="col-md-9  ">
                        <p class="buy_now cur1">Buy Now</p>
                        <div class="amount">$<?php echo $catOne['price'] ?></div>
                      </div>
                    </div>
                  </div>
                </div>
                <span>.......................................................</span>
                <div class="text-center">
                  <a href="product_details.php?product_id=<?php echo $catOne['id'] ?>" class="btn btn-primary rounded-lg mt-2">Submit A Bid </a>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>



      </div>
    </div>
  </section>
  <!-- --------------------------------------------------------------------------end section vehicles----------- -->
  <!-- -------------------------------------------------start section Jewelry--------------------------------- -->
  <br>
  <br>
  <div class="container">
    <div class="d-flex  mb-3">

      <div class="p-2 "><img src="images/02.png" class="w-100"></div>
      <div class="p-2 mt-2">
        <h1 class="name_cats">Jewelry</h1>
      </div>

      <div class="ml-auto p-2">
        <a href="list.php?cat_id=2" class="btn btn-light btn-lg rounded-pill border-dark"> View ALL</a>
      </div>
    </div>
  </div>
  <section id="Jewelry" class="mt-5">
    <div class="container">
      <div class="row">
        <?php foreach ($productsForcategorieTow as $catTwo) { ?>


          <div class="col-md-4">
            <div class="card" style="width: 18rem;">
              <img src="images/<?php echo $catTwo['img'] ?>" class="card-img-top w-80 p-2" style="height: 300px;">
              <div class="card-body">
                <h5 class="card-title"><?php echo $catTwo['name'] ?></h5>
                <span>.......................................................</span>
                <div class="row ">
                  <div class="col-md-6 border-right">
                    <div class="row ">
                      <div class="col-md-3">
                        <i class="fas fa-gavel  icon_bid fa-rotate-270"></i>
                      </div>
                      <div class="col-md-9">
                        <p class="current_bid cur1">Current Bid</p>
                        <div class="amount">$<?php
                                              $lastBid = $prodctsData->getTheLastBid($catTwo['id']);

                                              echo $lastBid['MAX(price)'];
                                              ?></div>
                      </div>
                    </div>
                  </div>


                  <div class="col-md-6">
                    <div class="row ">
                      <div class="col-md-3">

                        <i class="fas fa-money-bill-wave  icon_money"></i>
                      </div>
                      <div class="col-md-9  ">
                        <p class="buy_now cur1">Buy Now</p>
                        <div class="amount">$<?php echo $catTwo['price'] ?></div>
                      </div>
                    </div>
                  </div>
                </div>
                <span>.......................................................</span>
                <div class="text-center">
                  <a href="product_details.php?product_id=<?php echo $catTwo['id'] ?>" class="btn btn-primary rounded-lg mt-2">Submit A Bid </a>
                </div>
              </div>
            </div>
          </div>

        <?php } ?>


      </div>
    </div>
  </section>
  <!-- --------------------------------------------------------------------------end section Jewelry----------- -->
  <!-- -------------------------------------------------start section Jewelry--------------------------------- -->
  <br>
  <br>
  <div class="container">
    <div class="d-flex  mb-3">

      <div class="p-2 "><img src="images/coin-1.png" class="w-100"></div>
      <div class="p-2 mt-2">
        <h1 class="name_cats">Watches</h1>
      </div>

      <div class="ml-auto p-2">
        <a href="list.php?cat_id=3" class="btn btn-light btn-lg rounded-pill border-dark"> View ALL</a>
      </div>
    </div>
  </div>
  <section id="Watches" class="mt-5">
    <div class="container">
      <div class="row">
        <?php foreach ($productsForcategorieThree as $catTree) { ?>


          <div class="col-md-4">
            <div class="card" style="width: 18rem;">
              <img src="images/<?php echo $catTree['img'] ?>" class="card-img-top w-80 p-2" style="height: 300px;">
              <div class="card-body">
                <h5 class="card-title"><?php echo $catTree['name'] ?></h5>
                <span>.......................................................</span>
                <div class="row ">
                  <div class="col-md-6 border-right">
                    <div class="row ">
                      <div class="col-md-3">
                        <i class="fas fa-gavel  icon_bid fa-rotate-270"></i>
                      </div>
                      <div class="col-md-9">
                        <p class="current_bid cur1">Current Bid</p>
                        <div class="amount">$<?php
                                              $lastBid = $prodctsData->getTheLastBid($catTree['id']);

                                              echo $lastBid['MAX(price)'];
                                              ?></div>
                      </div>
                    </div>
                  </div>


                  <div class="col-md-6">
                    <div class="row ">
                      <div class="col-md-3">

                        <i class="fas fa-money-bill-wave  icon_money"></i>
                      </div>
                      <div class="col-md-9  ">
                        <p class="buy_now cur1">Buy Now</p>
                        <div class="amount">$<?php echo $catTree['price'] ?></div>
                      </div>
                    </div>
                  </div>
                </div>
                <span>.......................................................</span>
                <div class="text-center">
                  <a href="product_details.php?product_id=<?php echo $catTree['id'] ?>" class="btn btn-primary rounded-lg mt-2">Submit A Bid </a>
                </div>
              </div>
            </div>
          </div>

        <?php } ?>


      </div>
    </div>
  </section>
  <!-- --------------------------------------------------------------------------end section Jewelry----------- -->


  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
</body>

</html>