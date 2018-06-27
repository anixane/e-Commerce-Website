<?php
error_reporting(0);
session_start();

if($_SESSION["admin"]!=$_SESSION["user"]){
  header("Location:profile.php");
}

if(isset($_GET["id"])){
  $id=$_GET["id"];
  $conn=mysqli_connect('localhost','root','','shopdb');

 if(!$conn ) {
      die('Could not connect');
   }
   
   $sql = "SELECT name,addr,phone,pincode FROM ord_addr WHERE order_id='$id'";

      
   $retval = mysqli_query( $conn, $sql );
   
   if(! $retval) {
      die('Could not select data');
   }
   
  $row = mysqli_fetch_array($retval, MYSQLI_BOTH);

      $name=$row[0];
      $addr=$row[1];
      $phone=$row[2];
      $pincode=$row[3];
   mysqli_close($conn);

   echo '<a href="_status.php">Go Back</a><button onclick="window.print()" style="float:right">Print</button><br><br><br><br>

   <center><h2 style="font-family:calibri">Delivery Slip</h2></center>
   <div style="min-height:150px; border:1px solid black; padding-left:30px; padding-top:30px">To,<br>
   <span style="font-weight:700pt; font-size: 15pt">'.$name.'</span> <br><br>
   <span style="font-weight:700pt; font-size: 14pt"><i>'.$addr.'</span> - '.$pincode.' </i><br><br>

   <span>Phone: '.$phone.'</span>
   </div>';



}else{
  header("Location: _status.php");
}






?>