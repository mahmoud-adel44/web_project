<?php

session_start();
require_once '../clasess/User.php';





if (isset($_POST['login-submit'])) {
  //read data from form admlogin
  $email = $_POST['email'];
  $password = $_POST['password'];

  // validation
  $user = new User;



  $result = $user->attempt($email, $password);

  // var_dump($result);
  // die();
  //if data is valid
  if ($result !== null) {
    $_SESSION['id'] = $result['id'];
    // var_dump($_SESSION['id']);
    // die();
    header('location:../profile.php');
  } else {
    header('location:../index.php');
  }
} else {
  header('location:../login.php');
}
