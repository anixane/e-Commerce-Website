<?php
error_reporting(0);
session_start();

if($_SESSION["admin"]!=$_SESSION["user"]){
  header("Location:profile.php");
}

$curr_user = $_SESSION["user"];
$total=0;

$conn=mysqli_connect('localhost','root','','shopdb');

 if(!$conn ) {
      die('Could not connect');
   }
   
   $sql = "SELECT order_id, username, prod_id, size, qty, status, title, image FROM orders,products WHERE orders.prod_id=products.id";


      
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
	<title>Order Status</title>
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

    .ac_bt{
      padding: 2px 6px 4px 6px;
      border-radius: 3px;
      box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.2);
    }

    .bt1{
       background: #fdd053;
    }

    .bt2{
       background: #a9dddf;
    }
 

    .bt3{
       background: #adca63;
    }

    .bt4{
       background: #e35d44;
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
              <div style="font-size: 20pt; color: rgba(0,0,0,0.5); font-weight: lighter;">Orders</div><br>
              <hr>
              <br>


              <table style="width: 100%" class="table table-striped">
                <tr style="font-weight: 700">
                  <td>ID</td>
                  <td>Photo</td>
                  <td>Name</td>
                  <td>username</td>
                  <td>product_id</td>
                  <td>size</td>
                  <td>qty</td>
                  <td>status</td>
                  <td>Action</td>
                  <td>Print Address</td>
                </tr>


                <?php
                  foreach ($arr as $prodd) {
                    
                    echo '<tr style="font-size:10pt;">
                  <td>'.$prodd["order_id"].'</td>
                  <td><img src="prod/'.$prodd["image"].'" height="133px" width="100px"></td>
                  <td>'.$prodd["title"].'</td>
                  <td>'.$prodd["username"].'</td>
                  <td>'.$prodd["prod_id"].'</td>
                  <td>'.$prodd["size"].'</td>
                  <td>'.$prodd["qty"].'</td>
                  <td>';

                  switch ($prodd["status"]) {
                    case 0:
                       echo 'Processing';
                      break;
                    case 1:
                       echo 'Shipped';
                      break;
                    case 2:
                       echo 'Delivered';
                      break;
                    
                    default:
                      echo "status unavailable";
                      break;
                  }

                  echo '</td>
                  <td><a href="_update_order.php?od='.$prodd["order_id"].'&pi='.$prodd["prod_id"].'&act=0" class="ac_bt bt1">Processing</a><br><br><a href="_update_order.php?od='.$prodd["order_id"].'&pi='.$prodd["prod_id"].'&act=1" class="ac_bt bt2">Shipped</a><br><br><a href="_update_order.php?od='.$prodd["order_id"].'&pi='.$prodd["prod_id"].'&act=2" class="ac_bt bt3">Delivered</a><br><br><a href="_cancel_order.php?id='.$prodd["order_id"].'&pid='.$prodd["prod_id"].'" class="ac_bt bt4">Cancel</a></td><td><a href="_print.php?id='.$prodd["order_id"].'">PRINT</a></td></tr>';

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