<?php
error_reporting(0);
session_start();
error_reporting(0);
if(isset($_GET['id'])){

    $id=$_GET['id'];

    $conn=mysqli_connect('localhost','root','','shopdb');

 if(!$conn ) {
      die('Could not connect');
   }
   
   $sql = "SELECT * FROM products WHERE id='$id'";


      
   $retval = mysqli_query( $conn, $sql );
   
   if(! $retval) {
      die('Could not select data');
   }
   
  $row = mysqli_fetch_array($retval, MYSQLI_BOTH);

      $id=$row[0];
      $title=$row[1];
      $brand=$row[2];
      $image=$row[3];
      $detail=$row[4];
      $gender=$row[5];
      $category=$row[6];
      $color=$row[7];
      $size_type=$row[8];
      $price=$row[9];


   mysqli_close($conn);





}else{
    header("Location: index.php");
}



?>
<!DOCTYPE html>
<html>
<head>
	<title>Products</title>
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
			margin-top: 140px;
		}
	</style>
</head>
<body>

<?php
  require('nav.html');
  ?>




    <div class="container inner_cont2">
    	<div class="tree"><?php echo 'Home / Clothing / '.$gender.' Clothing / '.$category.' / '.$brand.' ';?></div><br>
    	<br>
    	<div class="row">
    		<div class="col-6"><img src="prod/<?php echo $image; ?>" class="prod_img"><br><div style="font-size: 10pt">Product code: <?php echo $id; ?></div></div>
    		<div class="col-6 prd_dsc">
    			<div class="prod_title"><?php echo $title; ?></div>
    			<div class="prod_price">Rs. <?php echo $price; ?></div><br><hr>
    			<div class="prod_size">SELECT SIZE</div>
    			<div class="select_size">

            <form action="add_to_bag.php" method="post">
              <input type="hidden" name="prd_id" value="<?php echo $id; ?>">
            <?php 

            if($size_type==1){
              echo '<label class="custom-control custom-radio">
            <input id="radio1" name="size" type="radio" value="S" required class="custom-control-input">
            <span class="custom-control-indicator"></span>
            <span class="custom-control-description">S</span>
            </label> &nbsp &nbsp

              <label class="custom-control custom-radio">
            <input id="radio1" name="size" type="radio" value="M" required class="custom-control-input">
            <span class="custom-control-indicator"></span>
            <span class="custom-control-description">M</span>
            </label> &nbsp &nbsp

              <label class="custom-control custom-radio">
            <input id="radio1" name="size" type="radio" value="L" required class="custom-control-input">
            <span class="custom-control-indicator"></span>
            <span class="custom-control-description">L</span>
            </label> &nbsp &nbsp&nbsp &nbsp

              <label class="custom-control custom-radio">
            <input id="radio1" name="size" type="radio" value="XL" required class="custom-control-input">
            <span class="custom-control-indicator"></span>
            <span class="custom-control-description">XL</span>
            </label> &nbsp &nbsp&nbsp &nbsp';

            }else{

              echo '<label class="custom-control custom-radio">
            <input id="radio1" name="size" type="radio" value="28" required class="custom-control-input">
            <span class="custom-control-indicator"></span>
            <span class="custom-control-description">28</span>
            </label> &nbsp &nbsp

              <label class="custom-control custom-radio">
            <input id="radio1" name="size" type="radio" value="30" required class="custom-control-input">
            <span class="custom-control-indicator"></span>
            <span class="custom-control-description">30</span>
            </label> &nbsp &nbsp

              <label class="custom-control custom-radio">
            <input id="radio1" name="size" type="radio" value="32" required class="custom-control-input">
            <span class="custom-control-indicator"></span>
            <span class="custom-control-description">32</span>
            </label> &nbsp &nbsp&nbsp &nbsp

              <label class="custom-control custom-radio">
            <input id="radio1" name="size" type="radio" value="34" required class="custom-control-input">
            <span class="custom-control-indicator"></span>
            <span class="custom-control-description">34</span>
            </label> &nbsp &nbsp&nbsp &nbsp';
            }

            ?>

		    			
    			</div><br>
          <div class="prod_qnty">SELECT QUANTITY</div>
          <input type="number" name="qty" value="1" style="max-width: 50px">

          <br><br>
    			<div class="add_bag"><input type="submit" class="btn btn-info add_bag_inner" value="ADD TO BAG" style="box-shadow:0px 10px 25px 1px rgba(0,0,0,0.1)"></div><br></form>
    			<hr>
    			<div class="prod_detail_head">PRODUCT DETAILS</div>
    			<div class="prod_detail"><?php echo $detail; ?></div>
    			<br><br><hr><br>
    			<div class="extra_info">
    				Tax: Applicable tax on the basis of exact location & discount will be charged at the time of checkout <br>
					100% Original Products <br>
					Free Delivery on order above Rs. 1199 <br>
					Cash on delivery might be available <br>
					Easy 30 days returns & exchange <br>
					Try & Buy might be available <br>
    			</div>
    		</div>
    	</div>

    	<br><br><hr><br><br>
    </div>

    <div class="webb">ECHO.</div>
   
    <div class="wrapper">
    	<div class="footer"></div> 
    </div>

    



</body>
</html>