<?php
error_reporting(0);
session_start();

if(!isset($_SESSION["user"])){
  header("Location: login.php");
}



if(isset($_POST["name"]) && isset($_POST["gender"]) && isset($_POST["phone"]) && isset($_FILES['file']['name'])){

$name=$_POST["name"];
$phone=$_POST["phone"];
$gender=$_POST["gender"];



$fname = $_FILES['file']['name'];
$fsize = $_FILES['file']['size'];
$type = $_FILES['file']['type'];
$tmp_name = $_FILES['file']['tmp_name'];
$location = 'dp/';

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
   
   $sql="UPDATE users SET name='$name',gender='$gender',picture='$newname', phone='$phone' WHERE username='".$_SESSION["user"]."'";



   $retval = mysqli_query( $conn, $sql );
   
   if(!$retval) {
      die('Could not update data');
   }
   
  
   
   mysqli_close($conn);

   header("Location: profile.php");
   die();
   }



?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Profile</title>
	<meta charset="UTF-8">
	<link rel="icon" href="image/fevicon.png">
	<link href="https://fonts.googleapis.com/css?family=Noto+Sans|Roboto:400,900" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="js/popper.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<style type="text/css">
	   body{
      margin-top: 130px;
     }
    .profile_pic{
      min-height: 200px;
      max-height: 200px;
      min-width: 200px;
      max-width: 200px;
      background-color: #7fcdc9;
      border-radius: 5px;
    }

    .contents{
      min-height: 450px;
      min-width: 100%;
      border: 1px solid rgba(0,0,0,0.2);
      border-radius: 3px;
      padding:40px 40px 40px 40px;
    }
    .inner_cont4{
      width: 80%;

    }
    
	
	</style>
</head>
<body>

	<?php
  require('nav.html');
  ?>



    <div class="inner_cont4">
      <div class="container">
        <div class="row">
          <div class="col-sm-4">
            <div class="profile_pic" style="float:right; font-size: 10pt; padding-top: 18%; padding-left: 10px; padding-right: 10px">Upload profile Picture <br><br><form enctype="multipart/form-data" action="edit_profile.php" method="post"><input type="file" name="file" ></div><br>
          </div>


          <div class="col-sm-8">
            <div class="contents">
              <div style="font-size: 20pt; color: rgba(0,0,0,0.5); font-weight: lighter;">Primary Information</div><br>
              <hr>
              <table border="0" cellpadding="0" cellspacing="0" align="left" width="70%" height="250px" style="color: rgba(0,0,0,0.6);">
                <tr>
                  <td>Name : </td>
                  <td><input type="text" name="name"></td>
                </tr>
                <tr>
                  <td>Gender : </td>
                  <td><select name="gender"><option>Male</option><option>Female</option></select></td>
                </tr>
                <tr>
                  <td>Phone : </td>
                  <td><input type="number" name="phone"></td>
                </tr>
                <tr>
                  <td colspan="2"><input type="submit" name="" class="btn btn-outline-info" value="save"></form></td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    



</body>
</html>