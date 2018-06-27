<?php
error_reporting(0);
session_start();

if(!isset($_SESSION["user"])){
  header("Location: login.php");
}


if(isset($_GET["user"]) && isset($_GET["item"])){

$user=$_GET["user"];
$item=$_GET["item"];


$conn=mysqli_connect('localhost','root','','shopdb');

 if(!$conn) {
      die('Could not connect');
   }

   
   $sql = "DELETE FROM bag WHERE username='$user' AND prod_id='$item'";



   $retval = mysqli_query( $conn, $sql );
   
   if(!$retval) {
      die('Could not delete data');
   }
   
  
   
   mysqli_close($conn);

   header("Location: bag.php");
   die();
   }
   header("Location: bag.php");

?>