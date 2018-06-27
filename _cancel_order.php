<?php
error_reporting(0);
session_start();

if($_SESSION["admin"]!=$_SESSION["user"]){
  header("Location:profile.php");
}

if(isset($_GET["id"]) && isset($_GET["pid"])){
  $id=$_GET["id"];
  $pid = $_GET["pid"];
  $conn=mysqli_connect('localhost','root','','shopdb');

 if(!$conn ) {
      die('Could not connect');
   }
   
   $sql = "SELECT price, qty FROM orders,products WHERE order_id='$id' AND prod_id='$pid' AND orders.prod_id=products.id";

      
   $retval = mysqli_query( $conn, $sql );
   
   if(! $retval) {
      die('Could not select data');
   }
   
  $row = mysqli_fetch_array($retval, MYSQLI_BOTH);
      $price=$row[0];
      $qty=$row[1];
    echo $price.'<br>'.$qty;

  $total = $price*$qty;
  $total = round($total+$total*0.06);
  
  $sqld = "DELETE FROM orders WHERE order_id='$id' AND prod_id='$pid'";
  $sqld2= "UPDATE ord_addr SET amt=amt-'$total'";
     $retvald = mysqli_query( $conn, $sqld);
    $retvalu = mysqli_query( $conn, $sqld2);
    header("Location: _status.php");
    

   mysqli_close($conn);

}else{
  header("Location: _status.php");
}






?>