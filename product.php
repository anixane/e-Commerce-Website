<?php
session_start();
error_reporting(0);
if(isset($_GET['item']) && $_GET['gender']){

    $item=$_GET['item'];
    $gender=$_GET['gender'];


    $conn=mysqli_connect('localhost','root','','shopdb');

 if(!$conn ) {
      die('Could not connect');
   }
   
   $sql = "SELECT id, brand, image, price FROM products WHERE category='$item' AND gen='$gender'";


      
   $retval = mysqli_query( $conn, $sql );
   
   if(! $retval) {
      die('Could not select data');
   }
   
  $i=0;
   while($row = mysqli_fetch_assoc($retval)){

    $arr[$i]=$row;+ 
    $i++;
}


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
    	<div class="row">
    	<div class="col cont_filter">
    		<div class="feature">BRAND</div><br>
    		<div class="brands choose">
            <input type="checkbox">
            All
    		<br><input type="checkbox">Roadster 
    		<br><input type="checkbox"> Jack & Jones 
    		<br><input type="checkbox"> Tommy Hilfiger 
    		<br><input type="checkbox"> WROGN 
    		<br><input type="checkbox"> Adidas 
    		<br><input type="checkbox"> Duke 
    		<br><input type="checkbox"> John Players 
    		<br><input type="checkbox"> Lee Cooper
    		</div>

    		<br><hr><br>
    		<div class="feature">PRICE</div><br>
    		<div class="price choose">
    		<input type="radio" name="sel_price"> Below Rs. 300  
    		<br><input type="radio" name="sel_price"> Below Rs. 500  
    		<br><input type="radio" name="sel_price"> Below Rs. 700 
    		<br><input type="radio" name="sel_price"> Below Rs. 1000  
    		<br><input type="radio" name="sel_price"> Below Rs. 1500 
    		<br><input type="radio" name="sel_price"> Below Rs. 2000
            <br><input type="radio" name="sel_price"> Rs. 2000+  
    		</div>
    	</div>
 		<div class="col cont_list">
 			<div class="head_bar"><div class="prod_head" style="float: left;">
            
            <?php

            if($item=='tshirt' && $gender=='men'){
                echo 'Men Tshirt';
            }elseif($item=='casual_shirt' && $gender=='men'){
                echo 'Men Casual Shirt';
            }elseif($item=='formal_shirt' && $gender=='men'){
                echo 'Men Formal Shirt';
            }elseif($item=='jacket' && $gender=='men'){
                echo 'Men Jacket';
            }elseif($item=='blazer' && $gender=='men'){
                echo 'Men Blazer';
            }elseif($item=='suit' && $gender=='men'){
                echo 'Men Suit';
            }elseif($item=='jeans' && $gender=='men'){
                echo 'Men Jeans';
            }elseif($item=='casual_trouser' && $gender=='men'){
                echo 'Men Casual Trouser';
            }elseif($item=='formal_trouser' && $gender=='men'){
                echo 'Men Formal Trouser';
            }elseif($item=='shorts' && $gender=='men'){
                echo 'Men Shorts';
            }elseif($item=='track_pant' && $gender=='men'){
                echo 'Men Track Pant';
            }elseif($item=='active_tshirt' && $gender=='men'){
                echo 'Men Active Tshirt';
            }elseif($item=='track_pant' && $gender=='men'){
                echo 'Men Track Pant';
            }elseif($item=='kurta' && $gender=='men'){
                echo 'Men Kurta';
            }elseif($item=='shervani' && $gender=='men'){
                echo 'Men Shervani';
            }elseif($item=='nehru_jacket' && $gender=='men'){
                echo 'Men Nehru Jacket';
            }elseif($item=='tops' && $gender=='women'){
                echo 'Women Tops';
            }elseif($item=='casual_shirt' && $gender=='women'){
                echo 'Women Casual Shirt';
            }elseif($item=='tshirt' && $gender=='women'){
                echo 'Women Tshirt';
            }elseif($item=='jacket' && $gender=='women'){
                echo 'Women Jacket';
            }elseif($item=='blazer' && $gender=='women'){
                echo 'Women Blazer';
            }elseif($item=='dress' && $gender=='women'){
                echo 'Women Dresses';
            }elseif($item=='jeans' && $gender=='women'){
                echo 'Women Jeans';
            }elseif($item=='trouser' && $gender=='women'){
                echo 'Women Trousers';
            }elseif($item=='skirt' && $gender=='women'){
                echo 'Women Skirts';
            }elseif($item=='shorts' && $gender=='women'){
                echo 'Women Shorts';
            }elseif($item=='active_tshirt' && $gender=='women'){
                echo 'Women Active Tshirts';
            }elseif($item=='track_pant' && $gender=='women'){
                echo 'Women Track Pants';
            }elseif($item=='kurti' && $gender=='women'){
                echo 'Women Kurti';
            }elseif($item=='suit' && $gender=='women'){
                echo 'Women Suits';
            }else{
                echo 'Products';
            }




            ?>

            </div> 
 			<div style="float: right">
 			<select class="custom-select">
  			<option selected disabled>Sort By:</option>
			<option value="1">Price: Low to High</option>
			<option value="2">Price: High to Low</option>
			</select></div>
			</div><br><br><hr>
			<br>

					

					<?php

                    try{
                        foreach ($arr as $prodd) {
                        echo '<div class="product">
                    <div class="card" style="width: 180px"><img class="card-img-top" src="prod/'.$prodd["image"].'" alt="Card image cap"><div class="card-body">
                    <div class="card_brand">'.$prodd["brand"].'</div><div class="card_price">Rs. '.$prodd["price"].'</div><a href="display.php?id='.$prodd["id"].'" style="text-decoration: none"><div class="add_cart">VIEW</div></a></div></div></div>';
                    }

                    }catch(Exception $e){
                        echo 'No products found.';
                    }

                    ?>

                    
                    


					
			
			
 		</div>
		</div>

        <hr>
        <div class="title">POPULAR SEARCHES</div>
    <div class="sr_tg" style="font-family: 'Noto Sans', sans-serif; font-size: 10pt; color: rgba(0,0,0,0.6); text-align: justify; padding-right: 100px;">Make up | Dresses For Girls | T-Shirts | Sandals | Headphones | Baby Dolls | Blazers For Men | Handbags | Ladies Watches | One Piece Dress | Bags | Sport Shoes | Reebok Shoes | Puma Shoes | Boxers | Wallets | Tops | Ear Rings | Fastrack Watches | Kurtis | Nike | Smart Watches | Titan Watches | Designer Blouse | Gowns | Rings | Shoes For Men | Forever 21 | Arrow | Mango | Punjabi Suits | Saree | Watches | Dresses | Lehengas | Nike Shoes Goggles | Suits | Chinos | Shoes | Adidas Shoes | Woodland Shoes | Jewellery</div>
    </div>
    <br><br>


      <div class="webb">ECHO.</div>
   
    <div class="wrapper">
        <div class="footer"></div> 
    </div>

</body>
</html>