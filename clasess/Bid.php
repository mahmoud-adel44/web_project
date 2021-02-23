<?php
// session_start();
require_once 'MySql.php';

class Bid extends MySql
{


  //get bid
  public function getbid($id)
  {
    $query = "SELECT * FROM bids 
      WHERE id ='$id' 
      ";
    $result = $this->connect()->query($query);
    $product = null;
    if ($result->num_rows == 1) {
      $product = $result->fetch_assoc();
    }
    return $product;
  }

  //get ALL Bids For One Product
  public function getAllBidssForProduct($product_id)
  {
    $query = "SELECT * FROM bids 
    WHERE product_id  ='$product_id' 
    ";
    $result = $this->connect()->query($query);
    $bids = [];

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        array_push($bids, $row);
      }
    }
    return $bids;
  }


  public function storeBid(array $data)
  {
    $data['price'] = mysqli_real_escape_string($this->connect(), $data['price']);
    $query = "INSERT INTO bids(`user_id`,`product_id`,`price`)
    VALUES('{$data['user_id']}','{$data['product_id']}','{$data['price']}')";
    $result =  $this->connect()->query($query);
    if ($result === true) {
      return true;
    }
    return false;
  }

  //edit 
  public function updateStatusForBid($id)
  {

    $query = "UPDATE bids SET 
    `accepted`= 1
    WHERE id= $id  
    ";

    $result =  $this->connect()->query($query);
    if ($result == true) {
      return true;
    }
    return false;
  }

  //delete
  public function delete($id)
  {
    $query = "DELETE FROM products where id= '$id'";
    $result =  $this->connect()->query($query);
    if ($result == true) {
      return true;
    }
    return false;
  }
}
