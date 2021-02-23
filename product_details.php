<?php

session_start();
if (!isset($_SESSION['id'])) {
  header('location:login.php');
}

$user_id = $_SESSION['id'];

require_once 'clasess/User.php';

require_once 'clasess/Product.php';
require_once 'clasess/Bid.php';
$productId = $_GET['product_id'];

$product = new Product;
$productDetails = $product->getOne($productId);

$lastBid = $product->getTheLastBid($productId);
// var_dump($_SESSION['errors'] == null);
// echo $lastBid;
// die();

$bid = new Bid;
$bidsInfo = $bid->getAllBidssForProduct($productId);

$user = new User;

// die();

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Project-MaZaD </title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style_aml.css">
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

    <div class="imageName">
      <img src="images/<?php echo $productDetails['img'] ?>" alt="Nissan versa s 2018" class="productimg" style="height: 500px;">
      <h1><?php echo $productDetails['name'] ?></h1>
    </div>
  </section>


  <div class="mb-5 ">
    <div class="container">
      <div class=" row">
        <div class="mazad1 col-md-6">
          <h2>Descrption For <?php echo $productDetails['name']; ?></h2>
          <table class="border-bottom">
            <p class="text-danger">*Note : Enter price More Than The Max Bid To Be The Winner For This Auction</p>
            <tr>
              <td class="price"> current price</td>
              <td class="price">$<?php echo $lastBid['MAX(price)']; ?>.</td>
            </tr>
          </table>

          <p><span>Info :</span> <?php echo $productDetails['desc'] ?></p>
          <style>
            p span {
              font-weight: 30px;
              font-size: 30px;
              color: blue;
            }
          </style>
        </div>


        <div class="col-md-6">

          <table class="table ">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">User Name</th>
                <th scope="col">Price</th>
                <th scope="col">Created At</th>
              </tr>
            </thead>
            <tbody>
              <?php $index = 1;
              foreach ($bidsInfo as $bid) { ?>
                <tr>
                  <th scope="row"><?php echo  $index; ?></th>
                  <td>
                    <?php
                    $userInfo = $user->getInfo($bid['user_id']);
                    if ($bid['user_id'] == $userInfo['id']) {

                      echo $userInfo['name'];
                    }

                    ?>

                  </td>
                  <td>$<?php echo $bid['price']; ?></td>
                  <td><?php echo $bid['created_at']; ?></td>
                </tr>
              <?php $index++;
              } ?>

            </tbody>
          </table>

        </div>

        <div class="bid-now-area mt-4 ">
          <form action="handlers/handleBids.php" method="POST">
            <input type="hidden" name="product_id" value="<?php echo $productDetails['id']; ?>">
            <?php if ($productDetails['status'] == 0) {

              if (isset($_SESSION['errors'])) {



                if ($_SESSION['errors'] == 'Please Enter Price more Than the current price') {

            ?>
                  <div class="alert alert-danger" role="alert">
                    <?php echo $_SESSION['errors']; ?>
                  </div>
                <?php  } ?>
              <?php  } ?>
              <input type="text" placeholder="enter you bid amount" name="price">
              <button type="submit" name="submit"> submit a bid </button>
            <?php  } else { ?>
              <div class="alert alert-danger text-center ml-5" role="alert">
                Sorr But This Auction Is Finshed Good Luck Nex Time!!
              </div>
            <?php  } ?>


          </form>
        </div>
      </div>
    </div>


  </div>



  <div>


  </div>

  <script src="js/jquery-3.5.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>

</html>