<?php
error_reporting(0);
session_start();

if(!isset($_SESSION["user"])){
  header("Location: login.php");
}

if(isset($_POST["prd_id"]) && isset($_POST["size"]) && isset($_POST["qty"]) ){

$id=$_POST["prd_id"];
$size=$_POST["size"];
$qty=$_POST["qty"];
$username=$_SESSION['user'];



$conn=mysqli_connect('localhost','root','','shopdb');

 if(!$conn) {
      die('Could not connect');
   }

   
   $sql = "INSERT INTO bag
      VALUES ('$id','$username','$size','$qty')";



   $retval = mysqli_query( $conn, $sql );
   
   if(!$retval) {
      die('Could not enter data');
   }
   
  
   
   mysqli_close($conn);

   header("Location: bag.php");
   die();
   }
   header("Location: bag.php");

?>