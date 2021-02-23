<?php
session_start();
require_once 'clasess/User.php';
require_once 'clasess/Product.php';
if (!isset($_SESSION['id'])) {
  header('location:login.php');
}

$user_id = $_SESSION['id'];

$user = new User;
$userInfo = $user->getInfo($user_id);


$cats = new Product;
$categories = $cats->getAllCategories();


$userProducts = $cats->getAllProductsForUser($user_id);
// var_dump($userProduct);
// die();


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
        <a class="navbar-brand" href="#">LoGo</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php"><span class="text-light">Home</span></a>
            </li>


          </ul>

        </div>
      </div>
    </nav>


    <div class="container">
      <div class="row parent align-items-start">
        <div class="col-md-3 user mt-4 ">
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
              <!--user products-->
              <h3 class="font-weight-bold">My Products</h3>
              <hr>

              <div class="row  border-bottom ">
                <?php foreach ($userProducts as $userProduct) { ?>
                  <div class="col-md-3 border-left border-right p-2 border-bottom">
                    <img class="w-100" src="images/<?php echo $userProduct['img']; ?>" style="height: 150px;">
                    <div class="d-inline font-weight-bold ">Posted in :</div>
                    <div class="d-inline"><?php echo $userProduct['created_at']; ?></div>
                    <div class="d-flex">
                      <a href="showBids.php?product_id=<?php echo $userProduct['id']; ?>" class="btn btn-success btn-sm">Show Bids</a>
                      <a href="handlers/handleDelete.php?product_id=<?php echo $userProduct['id']; ?>" class="btn btn-danger btn-sm">DeLeTe</a>
                    </div>
                  </div>
                <?php } ?>



              </div>
            </div>
            <!--End of user products-->
            <div class="user col-12 mt-4 mb-5">
              <!--form of products-->
              <h3 class="font-weight-bold">Add a new product</h3>
              <hr>
              <form action="handlers/handleAdd.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Name product" name="name">
                </div>
                <div class="form-group">
                  <input type="number" class="form-control" placeholder="price product" name="price">
                </div>

                <div class="form-group">
                  <textarea class="form-control" rows="3" placeholder="Type Here Descrption For Your product" name="desc"></textarea>
                </div>

                <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                <div class="form-group mt-4 ">
                  <input type="file" class="form-control-file" name="img">
                </div>
                <div class="form-group">
                  <label for="exampleFormControlSelect1" class="font-weight-bold">Select the category of your
                    product</label>
                  <select class="form-control" name="category_id">
                    <option hidden>Select the category</option>
                    <?php foreach ($categories as $cat) { ?>
                      <option value="<?php echo $cat['id']; ?>"><?php echo $cat['name'] ?></option>


                    <?php } ?>
                  </select>
                  <button type="submit" name="submit" class="btn mt-4 button">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>

  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
</body>

</html>