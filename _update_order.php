<?php
error_reporting(0);
if(isset($_GET["od"]) && isset($_GET["pi"]) && isset($_GET["act"]) ){

$od=$_GET["od"];
$pi=$_GET["pi"];
$act=$_GET["act"];




$conn=mysqli_connect('localhost','root','','shopdb');

 if(!$conn) {
      die('Could not connect');
   }
   
   $sql = "UPDATE orders SET status='$act' WHERE order_id='$od' AND prod_id='$pi'";

   $retval = mysqli_query( $conn, $sql );
   
   if(!$retval) {
      die('Could not update data');
   }
   
  
   
   mysqli_close($conn);

   header("Location: _status.php");
   die();
  

   }



?>