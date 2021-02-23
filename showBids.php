<?php
session_start();
require_once 'clasess/User.php';
require_once 'clasess/Product.php';
require_once 'clasess/Bid.php';
if (!isset($_SESSION['id'])) {
  header('location:login.php');
}

$user_id = $_SESSION['id'];

$user = new User;
$userInfo = $user->getInfo($user_id);


$productId = $_GET['product_id'];
$prod = new Product;
$product = $prod->getOne($productId);

$bid = new Bid;
$bidsInfo = $bid->getAllBidssForProduct($productId);

$user = new User;
?>



<html>

<head>
  <title>Profile Page</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/all.min.css">
  <link rel="stylesheet" href="css/style_lolo.css">
</head>

<body>

  <div class="upper_layer w-100">
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
    <nav class="navbar navbar-expand-lg navbar-light ">
      <div class="container">
        <!-- <a class="navbar-brand" href="#"><img src="images/logo.png" alt="" srcset=""></a>
         -->
        <a class="navbar-brand" href="#">LoGo</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php"><span>Home</span></a>
            </li>


          </ul>

        </div>
      </div>
    </nav>


    <div class="container">
      <div class="row ">
        <div class="col-md-3 user mt-3 ">
          <!--User data-->
          <a class="link" href="#"><i class="far fa-edit icon-place"></i> Edit</a>
          <div class="text-center">
            <img src="images/user.png">



            <h6 class="mt-2 e-color"><?php echo $userInfo['email']; ?></h6>
          </div>
          <div class="mt-4">
            <div class="d-inline font-weight-bold">Name :</div>
            <div class="d-inline"><?php echo $userInfo['name']; ?></div>
            <br> <br>
            <div class="d-inline font-weight-bold mt-3">Date of birth :</div>
            <div class="d-inline"><?php echo $userInfo['date_birth']; ?></div>
            <br> <br>
            <div class="d-inline font-weight-bold">Address :</div>
            <div class="d-inline"><?php echo $userInfo['address']; ?></div>
            <br> <br>
            <div class="d-inline font-weight-bold">Mobile Number :</div>
            <div class="d-inline"><?php echo $userInfo['phone']; ?></div>
          </div>
        </div>

        <!--End of user data-->
        <div class="ml-4 col-md-8">
          <div class="row inner">
            <div class="user col-12 mt-4">
              <h3><span class="text-info">ALL Bids :</span></h3>
              <!--user products-->
              <table class="table table-dark">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">User Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $index = 1;
                  foreach ($bidsInfo as $bid) { ?>
                    <tr>
                      <th scope="row"><?php echo $index; ?></th>
                      <td>
                        <?php
                        $userInfo = $user->getInfo($bid['user_id']);
                        if ($bid['user_id'] == $userInfo['id']) {

                          echo $userInfo['name'];
                        }

                        ?>

                      </td>
                      <td><?php echo $bid['price']; ?></td>
                      <td><?php echo $bid['created_at']; ?></td>
                      <td><?php

                          if ($bid['accepted'] == 0) {
                            echo "Watting";
                          } else {
                            echo "Accepted";
                          }

                          ?></td>
                      <td>
                        <?php
                        if ($bid['accepted'] == 0) {

                          if ($product['status'] == 0) {
                        ?>

                            <a href="handlers/handleBidStatus.php?bid_id=<?php echo $bid['id']; ?>" class="btn btn-success btn-sm" id="accepted">Accepte</a>
                          <?php  } else { ?>
                            <i class="fas fa-times text-danger fa-2x"></i>
                          <?php  } ?>
                        <?php  } else { ?>
                          <i class="fas fa-check text-success fa-2x"></i>

                        <?php  } ?>



                      </td>
                    </tr>
                  <?php $index++;
                  } ?>

                </tbody>
              </table>







            </div>
          </div>
          <!--End of user products-->

        </div>
      </div>
    </div>
  </div>
  </div>
  </div>
  <script src="mine.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
</body>

</html>