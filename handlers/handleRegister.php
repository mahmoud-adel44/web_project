<?php

require_once '../clasess/User.php';
session_start();


if (isset($_POST['submit'])) {




  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $address = $_POST['address'];
  $date_birth = $_POST['date_birth'];
  $phone = $_POST['phone'];


  //validation





  //if date is valid
  if (true) {
    // update in db
    $data = [
      'name' => $name,
      'email' => $email,
      'password' => $password,
      'address' => $address,
      'date_birth' => $date_birth,
      'phone' => $phone,

    ];



    //store
    $row = new User;
    $result = $row->Register($data);


    //if stored db succsess

    if ($result == true) {
      $result = $row->attempt($email, $password);
      if ($result != null) {
        $_SESSION['id'] = $result['id'];
        // var_dump($_SESSION['id']);
        // die();
        header('location:../profile.php');
        die();
      }
      header('location:../index.php');
    } else {
    }
  } else {
  }
} else {
  header('location:../register.php');
}
