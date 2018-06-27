<?php
error_reporting(0);
if(isset($_POST["id"]) && isset($_POST["title"]) && isset($_POST["brand"]) && isset($_FILES['file']['name']) && isset($_POST["detail"]) && isset($_POST["gen"]) && isset($_POST["color"]) && isset($_POST["sizetyp"]) && isset($_POST["price"]) && isset($_POST["catg"])){

$id=$_POST["id"];
$ttl=$_POST["title"];
$brand=$_POST["brand"];
$detail=$_POST["detail"];
$gender=$_POST["gen"];
$color=$_POST["color"];
$size=$_POST["sizetyp"];
$price=$_POST["price"];
$category=$_POST["catg"];




$fname = $_FILES['file']['name'];
$fsize = $_FILES['file']['size'];
$type = $_FILES['file']['type'];
$tmp_name = $_FILES['file']['tmp_name'];
$location = 'prod/';

$md5 = md5($fname.$fsize.$type);

$title = md5($md5);

$newname = $title.".jpg";

if(isset($fname)){
  if(!empty($fname)){
    move_uploaded_file($tmp_name, $location.$newname);
  }
}




$conn=mysqli_connect('localhost','root','','shopdb');

 if(!$conn) {
      die('Could not connect');
   }
   
   $sql = "INSERT INTO products
      (id,title,brand,image,detail,gen,category,color,size_type,price) 
      VALUES ('$id','$ttl','$brand','$newname','$detail','$gender','$category','$color','$size','$price')";



   $retval = mysqli_query( $conn, $sql );
   
   if(!$retval) {
      die('Could not enter data');
   }
   
  
   
   mysqli_close($conn);

   header("Location: _add_product.php");
   die();
   }



?>