<?php
session_start();
if (!isset($_SESSION['id'])) {
  header('location:login.php');
}
require_once 'clasess/User.php';

require_once 'clasess/Product.php';
$user_id = $_SESSION['id'];
$categoryId = $_GET['cat_id'];

$prodctsData = new Product;

$products = $prodctsData->getAllProductsForCategory($categoryId);


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/all.min.css">
  <link rel="stylesheet" href="css/style_aya.css">
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
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="profile.php"><i class="fas fa-shopping-basket fa-2x text-white"></i></a>
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
        <a class="navbar-brand" href="#"><img src="images/user.png" class="w-50"></a>


        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php"><span>Home</span></a>
            </li>

          </ul>

        </div>
      </div>
    </nav>


    <div class="section-header">
      <h3 class="title text-center">Bid on These Featured Auctions!</h3>

    </div>








    <!-- --------------------------------------------------------------------------end section vehicles----------- -->
    <!-- -------------------------------------------------start section Jewelry--------------------------------- -->

    <section id="Jewelry" class="mt-4">



      <div class="container">

        <div class="row ">
          <?php foreach ($products  as $product) { ?>
            <div class="col-md-4">
              <div class="card mb-5" style="width: 20rem;">
                <img src="images/<?php echo $product['img']; ?>" class="card-img-top w-80 p-2" style="height: 300px;">
                <div class="card-body">
                  <h6 class="title">
                    <a href="product_details.php?product_id=<?php echo $product['id'] ?>"><?php echo $product['name']; ?></a>
                  </h6>
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
                                                $lastBid = $prodctsData->getTheLastBid($product['id']);

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
                          <div class="amount">$<?php echo $product['price']; ?></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <span>.......................................................</span>
                  <div class="text-center">
                    <a href="product_details.php?product_id=<?php echo $product['id'] ?>" class="custom-button">Submit a bid</a>
                  </div>
                </div>
              </div>
            </div>

          <?php } ?>


        </div>


      </div>

      </div>

    </section>






</body>

</html>