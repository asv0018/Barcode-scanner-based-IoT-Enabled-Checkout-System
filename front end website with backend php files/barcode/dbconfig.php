<?php
$username="root";
$password="";
$host="localhost";
$database="barcode";

$con= mysqli_connect($host,$username,$password,$database);

if(!$con){
  die("connection failed: ".mysqli_connect_error());
}

?>
