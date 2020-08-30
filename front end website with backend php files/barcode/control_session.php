<?php

function clear_trolley(){
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "barcode";

  // Create connection
  $conn = mysqli_connect($servername, $username, $password, $dbname);
  // Check connection
  if (!$conn) {
     die("Connection failed: " . mysqli_connect_error());
  }

  // sql to delete a record
  $sql = "DELETE FROM cart";

  if (mysqli_query($conn, $sql)) {
     echo "Trolley is cleared";
  } else {
     echo "Error deleting record: " . mysqli_error($conn);
  }

  mysqli_close($conn);
}

function add_the_items(){
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "barcode";
  $name="";
  $mrp=0;

  // Create connection
  $conn = mysqli_connect($servername, $username, $password, $dbname);
  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  $sql="SELECT grocery_name,mrp FROM groceries WHERE barcode='$code'";

  $result = mysqli_query($conn, $sql);

  if ($result){
      // output data of each row
      $row = mysqli_fetch_assoc($result);
        $name=$row['grocery_name'];
        $mrp=$row['mrp'];
        echo $name;
        echo $mrp;
        $mysql = "INSERT INTO cart (grocery_name, mrp)
        VALUES ('$name', '$mrp')";

        if (mysqli_query($conn, $sql)) {
           echo "$name. is added to the cart";
        } else {
           echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }


      }else{
        echo "scanned item, not available";
      }
      //mysqli_close($conn);
      mysqli_close($conn);
      }




if (isset($_GET['operation'])){
//operation: 1 => start of the new session and clear the previous details of the trolley.
//operation: 2 => end the session and checkout the payment from your phone or at the counter.
$operation=$_GET['operation'];
if($operation==1){
  clear_trolley();
}
else if ($operation==2){
  echo "thank you, proceed to the payment, thanks for shopping with us , we love you, visit us again, have a good day.";
}
}









 ?>
