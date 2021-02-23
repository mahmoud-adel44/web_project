<?php

session_start();

require_once '../clasess/Product.php';

if (!isset($_SESSION['id'])) {
  header('location:../login.php');
  die();
}

$id = $_GET['product_id'];

$prod = new Product;
$product = $prod->getOne($id);
$img = $product['img'];


$result = $prod->delete($id);
unlink('../images/' . $img);
// var_dump($result);
// die();

header('location: ../profile.php');
