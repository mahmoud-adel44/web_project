<?php
// session_start();
require_once 'MySql.php';

class Product extends MySql
{

  //get all
  public function getAllCategories()
  {
    $query = "SELECT * FROM categories";
    $result = $this->connect()->query($query);

    $products = [];

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        array_push($products, $row);
      }
    }
    return $products;
  }

  //get one
  public function getAllProductsForCategory($category_id)
  {
    $query = "SELECT * FROM products 
    WHERE category_id  ='$category_id ' 
    ";
    $result = $this->connect()->query($query);
    $products = [];
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        array_push($products, $row);
      }
    }
    return $products;
  }

  //get First category
  public function getThreeProductsForFirstCategory()
  {
    $query = "SELECT * FROM products WHERE category_id = '1' LIMIT 3 
    ";
    $result = $this->connect()->query($query);
    $products = [];
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        array_push($products, $row);
      }
    }
    return $products;
  }

  //get second category
  public function getSecondProductsForFirstCategory()
  {
    $query = "SELECT * FROM products WHERE category_id = '2' LIMIT 3 
    ";
    $result = $this->connect()->query($query);
    $products = [];
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        array_push($products, $row);
      }
    }
    return $products;
  }

  //get  third category
  public function getThirdProductsForFirstCategory()
  {
    $query = "SELECT * FROM products WHERE category_id = '3' LIMIT 3 
    ";
    $result = $this->connect()->query($query);
    $products = [];
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        array_push($products, $row);
      }
    }
    return $products;
  }

  //get one
  public function getOne($id)
  {
    $query = "SELECT * FROM products 
    WHERE id ='$id' 
    ";
    $result = $this->connect()->query($query);
    $product = null;
    if ($result->num_rows == 1) {
      $product = $result->fetch_assoc();
    }
    return $product;
  }
  public function store(array $data)
  {
    $data['name'] = mysqli_real_escape_string($this->connect(), $data['name']);
    $data['desc'] = mysqli_real_escape_string($this->connect(), $data['desc']);

    // INSERT INTO products(`name`,`desc`,`price`,`img`, `category_id`, `user_id`)
    // VALUES('lolooo','loloooo',500,'5.jpg', '4' , '2')

    $query = "INSERT INTO products(`name`,`desc`,`price`,`img`, `category_id`, `user_id`)
    VALUES('{$data['name']}','{$data['desc']}','{$data['price']}','{$data['img']}', '{$data['category_id']}' , '{$data['user_id']}')";

    $result =  $this->connect()->query($query);
    if ($result === true) {
      return true;
    }
    return false;
  }


  //updateStatusForProduct
  public function updateStatusForProduct($productId)
  {

    $query = "UPDATE products SET 
    `status`= 1
    WHERE id= $productId  
    ";

    $result =  $this->connect()->query($query);
    if ($result == true) {
      return true;
    }
    return false;
  }


  //delete
  public function delete($product_id)
  {
    $query2 = "DELETE FROM bids where product_id = '$product_id'";
    $result2 =  $this->connect()->query($query2);
    $query1 = "DELETE FROM products where id = '$product_id'";
    $result1 =  $this->connect()->query($query1);
    if ($result1 == true  && $result2 == true) {
      return true;
    }
    return false;
  }


  public function getAllProductsForUser($user_id)
  {
    $query = "SELECT * FROM products 
    WHERE user_id  ='$user_id' 
    ";
    $result = $this->connect()->query($query);
    $products = [];
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        array_push($products, $row);
      }
    }
    return $products;
  }

  //get TheLast Bid
  public function getTheLastBid($productId)
  {
    $query = "SELECT MAX(price) FROM bids WHERE product_id = '$productId'  
      ";
    $result = $this->connect()->query($query);
    $product = null;
    if ($result->num_rows == 1) {
      $product = $result->fetch_assoc();
    }
    return $product;
  }
}
