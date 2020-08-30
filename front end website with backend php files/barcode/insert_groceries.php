<<?php
require("dbconfig.php");
if (isset($_GET['groceries'])&&isset($_GET['bar_code'])&&isset($_GET['mrp'])){
  $grocery_name=$_GET['groceries'];
  $code=$_GET['bar_code'];
  $mrp=$_GET['mrp'];
$sql = "INSERT INTO groceries (grocery_name,bar_code_no,mrp)
VALUES ('$grocery_name', '$code', '$mrp')";

if ($con->query($sql) === TRUE) {
    echo "New record created successfully";
    echo '<script>alert("product added")</script>';
    header("location:addproducts.html");
    exit;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}






?>
