<?php
error_reporting(0);
session_start();

if($_SESSION["admin"]!=$_SESSION["user"]){
  header("Location:profile.php");
}

$curr_user = $_SESSION["user"];


$conn=mysqli_connect('localhost','root','','shopdb');

 if(!$conn ) {
      die('Could not connect');
   }
   
   $sql = "SELECT  `time`, user, name, (case when user in (SELECT * FROM admins) then 'admin' else 'user' end) as user_type FROM log, users WHERE log.user = users.username ORDER BY `time` DESC  LIMIT 30";

      
   $retval = mysqli_query( $conn, $sql );
   
   if(! $retval) {
      die('Could not select data');
   }
   
  $i=0;
   while($row = mysqli_fetch_assoc($retval)){

    $arr[$i]=$row;
    $i++;
}


   mysqli_close($conn);




?>

<!DOCTYPE html>
<html>
<head>
	<title>User Log</title>
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

    .contents{
      min-height: 450px;
      min-width: 100%;
      border: 1px solid rgba(0,0,0,0.2);
      border-radius: 3px;
      padding:40px 40px 40px 40px;
    }
 
    
	
	</style>


</head>
<body>

	<?php
  require('nav.html');
  ?>



    <div class="inner_cont4">
      <center>
      <div class="container">
        <div class="row">
  


          <div class="col-sm-12">
            <div class="contents">
              <div style="font-size: 20pt; color: rgba(0,0,0,0.5); font-weight: lighter;">Log</div><br>
              <hr>
              <br>


              <table style="width: 100%" class="table table-striped">
                <tr style="font-weight: 700">
                  <td>Date/Time</td>
                  <td>username</td>
                  <td>Name</td>
                  <td>User Type</td>
                </tr>


                <?php
                  foreach ($arr as $prodd) {
                    
                    echo '<tr style="font-size:10pt">
                  <td>'.$prodd["time"].'</td>
                  <td>'.$prodd["user"].'</td>
                  <td>'.$prodd["name"].'</td>';
                 if($prodd["user_type"]=='admin'){
                  echo  '<td style="color:red">'.$prodd["user_type"].'</td>';
                 }else{
                  echo ' <td><b>'.$prodd["user_type"].'</b></td>';
                 }

                  }

                ?>

                


              </table>




              
            </div>
              <br>
              <br>
          </div>
        </div>
      </div>
      </center>
    </div>

    



</body>
</html>