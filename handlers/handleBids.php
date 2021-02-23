<?php

session_start();
require_once '../clasess/Bid.php';
require_once '../clasess/Product.php';



// var_dump($_SESSION['id']);
// die();


//SELECT MAX(price) FROM bids WHERE product_id = 11 كويري اللي هيجبلك اعلي سعر 


if (!isset($_SESSION['id'])) {
  header('location:../login.php');
  die();
}
$_SESSION['errors'] = null;
if (isset($_POST['submit'])) {

  $product_id = $_POST['product_id'];
  $price = $_POST['price'];
  $user_id = $_SESSION['id'];

  $prod = new Product;
  $maxBid = $prod->getTheLastBid($product_id);
  // var_dump(intval($price));
  // die();


  if (intval($maxBid["MAX(price)"]) > intval($price)) {
    $_SESSION['errors'] = 'Please Enter Price more Than the current price';
    header('location:../product_details.php?product_id=' . $product_id);
    // var_dump($_SESSION['errors']);
    die();
  } elseif (intval($maxBid["MAX(price)"]) < intval($price)) {
    $_SESSION['errors'] = 'Thank You';
    // var_dump($_SESSION['errors']);
    // die();
  }



  if (true) {



    $data = [
      'product_id' => $product_id,
      'price' => $price,
      'user_id' => $user_id

    ];
    $bid = new Bid;
    $result = $bid->storeBid($data);


    if ($result == true) {


      header('location:../product_details.php?product_id=' . $product_id);
    } else {
      // $_SESSION['errors'] = ['error storing in database'];
      header('location:../product_details.php?product_id=' . $product_id);
    }
  } else {
    // $_SESSION['errors'] = $errors;
    header('location:../login.php');
  }
} else {
  header('location:../profile.php');
}
