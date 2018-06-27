<?php
error_reporting(0);
session_start();
if(!isset($_SESSION["user"])){
  header("Location: login.php");
}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Delivery</title>
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
			margin-top: 100px;
		}
		
    .prod_box{
      min-height: 170px;
      min-width: 650px;
      max-width: 650px;
      border: 1px solid rgba(0,0,0,0.1);
      padding: 20px;
    }

    .price_box{
      min-width: 300px;
      max-width: 300px;
      min-height: 150px;
      border: 1px solid rgba(0,0,0,0.1);
    }

    .label{
      font-size: 10pt;
      color:rgba(0,0,0,0.6);
    }
	</style>
</head>
<body>

	<?php
  require('nav.html');
  ?>


    <div class="inner_cont2">
    <div class="container">
      <div style="font-family: 'Roboto', sans-serif; color: rgba(0,0,0,0.7); font-weight: 700; font-size: 15pt">Enter address</div><br><br>
      <div class="row">
        <div class="col-8">
            

         <div class="prod_box">
          <form action="checkout.php" method="post">
          <span class="label" style="margin-right: 160px">Pincode</span><span class="label">Phone</span> <br>
          <input type="text" name="pincode" required style="width: 200px">
          <input type="text" name="phone" required style="width: 200px">
          <br><br>

          <span class="label">Locality/Town</span> <br>
          <input type="text" name="town" required style="width: 405px">

          <br><br>

          <span class="label" style="margin-right: 140px">City/District</span><span class="label">State</span> <br>
          <input type="text" name="dist" required style="width: 200px">
          <input type="text" name="state" required style="width: 200px">
          <br><br>

          <span class="label">Name</span> <br>
          <input type="text" name="name" required style="width: 405px">
          <br><br>

           <span class="label">Address</span> <br>
          <textarea name="address" required style="width: 405px; height: 100px"></textarea>
          <br><br>
          <input type="submit" value="Submit" style="background: #2cd2b1; color: #fff; text-align: center; padding-top: 10px; padding-bottom: 10px; border-radius: 5px; box-shadow: 0px 10px 25px 1px rgba(0,0,0,0.1); border: 0px solid white; padding-left: 20px; padding-right: 20px">
          </form>

         </div>
          




        </div>


        <div class="col-4">
          
          <div class="price_box" style="padding: 10px; padding-top: 20px">
            
            <div style="font-family: 'Roboto', sans-serif; color: rgba(0,0,0,0.5); font-weight: 700; font-size: 10pt">INFO</div>
            <br>
            <b>Total : Rs. <?php echo $_SESSION["total_cost"];?> </b><br>

            Fill the details and click on 'submit' to place the order.
          </div>

        </div>
      </div>

    </div>
    </div>


    <br><br><br>

     <div class="webb">ECHO.</div>
   
    <div class="wrapper">
      <div class="footer"></div> 
    </div>
</body>
</html>