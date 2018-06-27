<?php
error_reporting(0);
session_start();
if(isset($_POST["username"]) && isset($_POST["password"])){

$username=$_POST["username"];

$conn=mysqli_connect('localhost','root','','shopdb');

 if(!$conn ) {
      die('Could not connect');
   }
   
   $sql = 'SELECT name, username, password FROM users WHERE username="'.$username.'"';

 
   $retval = mysqli_query( $conn, $sql );
   
   if(! $retval) {
      die('Could not select data');
   }
   
 
 $row = mysqli_fetch_array($retval, MYSQLI_BOTH);

      $name=$row[0];
      $uname=$row[1];
      $pass=$row[2];


   $sql2 = "SELECT admin FROM admins WHERE admin='$username'";
    $retval2 = mysqli_query( $conn, $sql2 );
   
   $numrows=mysqli_num_rows($retval2);
   
   if($numrows>0){
      $_SESSION["admin"]=$uname;
   }
   

   



   


if($_POST["username"]==$uname && $_POST["password"]==$pass){


$_SESSION["user"] = $uname;
$_SESSION["name"] = $name;

$log = "CALL updatelog('$uname')";
$result_log = mysqli_query( $conn, $log);


		header("Location: profile.php");
}else{
      header("Location: login.php?e=1");
die();
}

mysqli_close($conn);
}
?>