<?php

session_start();
require_once '../clasess/Product.php';

require_once '../clasess/helpers/Image.php';



use helpers\Image;



if (!isset($_SESSION['id'])) {
  header('location:../login.php');
  die();
}

if (isset($_POST['submit'])) {

  $name = $_POST['name'];
  $desc = $_POST['desc'];
  $price = $_POST['price'];
  $user_id = $_POST['user_id'];
  $category_id  = $_POST['category_id'];
  $img = $_FILES['img'];



  if (true) {

    $image = new Image($img);

    $data = [
      'name' => $name,
      'desc' => $desc,
      'price' => $price,
      'user_id' => $user_id,
      'category_id' => $category_id,
      'img' => $image->new_name

    ];
    $prod = new Product;
    $result = $prod->store($data);
    // var_dump($result);
    // die();


    if ($result == true) {

      $image->upload();
      header('location:../profile.php');
    } else {
      // $_SESSION['errors'] = ['error storing in database'];
      header('location:../profile.php');
    }
  } else {
    // $_SESSION['errors'] = $errors;
    header('location:../profile.php');
  }
} else {
  header('location:../profile.php');
}
