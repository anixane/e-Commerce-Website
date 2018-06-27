<?php
error_reporting(0);
session_start();


if(isset($_POST["pincode"]) && isset($_POST["phone"]) && isset($_POST["town"]) && isset($_POST["dist"]) && isset($_POST["state"]) && isset($_POST["name"]) && isset($_POST["address"]) ){

$pincode=$_POST["pincode"];
$phone=$_POST["phone"];
$town=$_POST["town"];
$dist=$_POST["dist"];
$state=$_POST["state"];
$name=$_POST["name"];
$address=$_POST["address"];
$order_id=hash("adler32", $_SESSION["user"].time(), FALSE);
$curr_user=$_SESSION["user"];
$tot_cost=$_SESSION["total_cost"];
$conn=mysqli_connect('localhost','root','','shopdb');

 if(!$conn) {
      die('Could not connect');
   }


   
   $sql = "INSERT INTO ord_addr 
      VALUES ('$order_id','$pincode','$phone','$town','$dist','$state','$name','$address','$tot_cost')";

   $retval = mysqli_query( $conn, $sql );
   
   if(!$retval) {
      die('Could not enter data');
   }



  $sqlx = "INSERT INTO orders (order_id, username, orders.prod_id, size, qty, status) SELECT '$order_id', bag.username, bag.prod_id, bag.size, bag.qty, '0' FROM bag WHERE bag.username='$curr_user'";

   $retvalx = mysqli_query( $conn, $sqlx );
   
   if(!$retvalx) {
      die('Could not enter data');
   }




$sql4 = "DELETE FROM bag WHERE username='$curr_user'";

   $retval4 = mysqli_query( $conn, $sql4 );
   
   if(!$retval4) {
      die('Could not delete data');
   }




   
   mysqli_close($conn);

   header("Location: bag.php?stat=1");
   die();
   }
  header("Location: bag.php");


?>