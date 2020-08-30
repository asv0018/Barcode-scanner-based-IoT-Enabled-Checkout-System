<?php
$username="root";
$password="";
$host="localhost";
$database="barcode";
$barcode=$_GET['barcode'];
$operation=$_GET['operation'];

$con= mysqli_connect($host,$username,$password,$database);

if(!$con){
  die("connection failed: ".mysqli_connect_error());
}

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

//if the user chooses operation 1 adding of the item to the cart is done.
//if the user chooses operation 2 removing of the item to the cart is done.


if($operation==1){
$sql =  "INSERT INTO cart (grocery_name,mrp)
SELECT grocery_name,mrp FROM groceries WHERE bar_code_no='$barcode'";

if (mysqli_query($con, $sql)) {
    echo "item added";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}

if($operation==2){

$sql= "DELETE cart FROM cart INNER JOIN groceries ON cart.grocery_name= groceries.grocery_name
  WHERE bar_code_no='$barcode'";
  if (mysqli_query($con, $sql)) {
      echo "item removed";
  } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

}


 ?>
