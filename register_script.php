<?php
error_reporting(0);

if(isset($_POST["name"]) && isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["conf_password"]) && isset($_POST["phone"]) ){

$name=$_POST["name"];
$pass=$_POST["password"];
$cpass=$_POST["conf_password"];
$username=$_POST["username"];
$phone=$_POST["phone"];
$gender="-";
$pic="prof.jpg";

if($pass!=$cpass){

header("Location: register.php");

}else{

$conn=mysqli_connect('localhost','root','','shopdb');

 if(!$conn) {
      die('Could not connect');
   }
   
   $sql = "INSERT INTO users
      (name,username,password,picture,gender,phone) 
      VALUES ('$name','$username','$pass','$pic','$gender','$phone')";



   $retval = mysqli_query( $conn, $sql );
   
   if(!$retval) {
      die('Could not enter data');
   }
   
  
   
   mysqli_close($conn);

   header("Location: login.php?e=2");
   die();
   }}
   header("Location: login.php?e=3");

?>