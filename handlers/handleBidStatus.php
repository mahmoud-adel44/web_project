<?php

session_start();

require_once '../clasess/Bid.php';
require_once '../clasess/Product.php';

if (!isset($_SESSION['id'])) {
  header('location:../login.php');
  die();
}

$bidId = $_GET['bid_id'];


$bid = new Bid;
$result = $bid->updateStatusForBid($bidId);
$currentBidData = $bid->getbid($bidId);
$productId = $currentBidData['product_id'];

$prod = new Product;
$result = $prod->updateStatusForProduct($productId);

// var_dump($currentBidData['product_id']);
// die();

// $prod = new Product;
// $result = $bid->get($bidId);
// var_dump($result);
// die();

if ($result == true) {
  header('location: ../showBids.php?product_id=' . $productId);
} else {
  header('location: ../profile.php');
}
