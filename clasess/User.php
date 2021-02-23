<?php

require_once 'MySql.php';

class User extends MySql
{
  public function attempt($email, $hased_password)
  {
    $query = "SELECT * FROM users 
    WHERE email = '$email' AND `password` = '$hased_password' ";

    $result = $this->connect()->query($query);

    $user = null;

    if ($result->num_rows == 1) {
      $user = $result->fetch_assoc();
    }
    return $user;
  }
  // end of attemp
  public function Register(array $data)
  {
    $query = "INSERT INTO users ( `name` , email , `password` , date_birth , phone , `address`)
    VALUES ('{$data['name']}' ,'{$data['email']}' , '{$data['password']}' ,'{$data['date_birth']}' ,'{$data['phone']}' ,'{$data['address']}' )
    ";

    $result = $this->connect()->query($query);
    // var_dump($result);
    if ($result == true) {
      return true;
    }
    return false;
  }
  // end of Register



  public function getInfo($userId)
  {
    $query = "SELECT * FROM users WHERE id = '$userId' ";


    $result = $this->connect()->query($query);
    $userData = null;
    if ($result->num_rows == 1) {
      $userData = $result->fetch_assoc();
    }
    return $userData;
  }

  // end of getInfo



}
